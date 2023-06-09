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
                $url_delete = route('student.destroy', Crypt::encrypt($data->id));

                $btn = "<div class='btn-group'>";
                $btn .= "<a href='$url_show' class = 'btn btn-outline-primary btn-sm text-nowrap'><i class='fas fa-info mr-2'></i> Lihat</a>";
                $btn .= "<a href='$url_edit' class = 'btn btn-outline-info btn-sm text-nowrap'><i class='fas fa-edit mr-2'></i> Edit</a>";
                $btn .= "<a href='$url_delete' class = 'btn btn-outline-danger btn-sm text-nowrap' data-confirm-delete='true'><i class='fas fa-trash mr-2'></i> Hapus</a>";
                $btn .= "</div>";

                return $btn;
            })
            ->toJson();
    }

    public function create()
    {
        $users = User::where('name', '!=', 'admin')->get();
        return view('students.create', compact('users'));
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
                'user_id' => 'required',
            ]);

            $input = $request->all();

            // Decrypt Data
            $input['user_id'] = Crypt::decrypt($request->user_id);

            // Save Image
            if ($file = $request->file('photo')) {
                $destinationPath = 'assets/images/mahasiswa/';
                $fileName = "MAHASISWA" . "_" . date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move($destinationPath, $fileName);
                $input['photo'] = $fileName;
            }

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
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $id = Crypt::decrypt($id);
            $student = Student::find($id);

            $student->delete();

            // Save Data
            DB::commit();

            // Alert & Redirect
            Alert::toast('Data Berhasil Dihapus', 'success');
            return redirect()->route('student.index');
        } catch (\Exception $e) {
            // If Data Error
            DB::rollBack();

            // Alert & Redirect
            Alert::toast('Data Tidak Terhapus', 'error');
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus' . $e->getMessage());
        }
    }
}
