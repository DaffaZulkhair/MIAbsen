<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        // Confirm Delete Alert
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('students.index');
    }

    public function datatable(Request $request)
    {
        $searchClass = $request->get('class');
        $searchSemester = $request->get('semester');
        $searchClassSemester = $searchSemester . " " . $searchClass;

        $model = Student::query()
            ->when(!empty($searchSemester), function ($query) use ($searchClassSemester) {
                $query->where('class', $searchClassSemester);
            })
            ->when(!empty($searchClass), function ($query) use ($searchClassSemester) {
                $query->where('class', $searchClassSemester);
            });
        return DataTables::of($model)
            ->editColumn('created_at', function ($data) {
                $dateFormat = Carbon::parse($data['created_at'])->translatedFormat('d F Y - H:i');
                return $dateFormat;
            })
            ->addColumn('action', function ($data) {
                $url_show = route('student.show', Crypt::encrypt($data->id));
                $url_edit = route('student.edit', Crypt::encrypt($data->id));

                $btn = "<div class='btn-group'>";
                $btn .= "<a href='$url_show' class = 'btn btn-outline-primary btn-sm text-nowrap'><i class='fas fa-info mr-2'></i> Lihat</a>";
                $btn .= "<a href='$url_edit' class = 'btn btn-outline-info btn-sm text-nowrap'><i class='fas fa-edit mr-2'></i> Edit</a>";
                $btn .= "</div>";

                return $btn;
            })
            ->toJson();
    }

    public function create()
    {
        return view('students.create');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = Student::find($id);

        return view('students.edit', compact('data'));
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data = Student::find($id);

        return view('students.show', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required',
                'username' => 'required',
                'photo' => 'mimes: jpg,jpeg,png|max:1024',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
            ]);

            $input = $request->all();

            // Save Image
            if ($file = $request->file('photo')) {
                $destinationPath = 'assets/files/';
                $fileName = "User" . "_" . date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move($destinationPath, $fileName);
                $input['photo'] = $fileName;
            }

            $input['password'] = Hash::make($input['password']);

            // Create User
            $user = User::create($input);

            $user->assignRole([2]);

            $input['name'] = $request->student_name;
            $input['user_id'] = $user->id;
            $input['class'] = $request->semester . " " . $request->class;

            // Create Data
            Student::create($input);

            // Save Data
            DB::commit();

            // Alert & Redirect
            Alert::toast('Data Berhasil Disimpan', 'success');
            return redirect()->route('student.index');
        } catch (\Exception $e) {
            // If Data Error
            DB::rollBack();

            // Alert & Redirect
            Alert::toast('Data Tidak Tersimpan', 'error');
            return redirect()->back()->with('error', 'Data Tidak Berhasil Disimpan' . $e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $id = Crypt::decrypt($id);
            $student = Student::find($id);

            $input = $request->all();

            // Update Data
            $input['class'] = $request->semester . " " . $request->class;
            $student->update($input);

            // Save Data
            DB::commit();

            // Alert & Redirect
            Alert::toast('Data Berhasil Disimpan', 'success');
            return redirect()->route('student.index');
        } catch (\Exception $e) {
            // If Data Error
            DB::rollBack();

            // Alert & Redirect
            Alert::toast('Data Tidak Tersimpan', 'error');
            return redirect()->back()->with('error', 'Data Tidak Berhasil Disimpan' . $e->getMessage());
        }
    }
}
