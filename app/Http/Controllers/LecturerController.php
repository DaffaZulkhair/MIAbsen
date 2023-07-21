<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    public function index()
    {
        // Confirm Delete Alert
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('lecturers.index');
    }

    public function datatable()
    {
        $model = Lecturer::query();

        return DataTables::of($model)
            ->addColumn('action', function ($data) {

                $url_edit = route('lecturer.edit', Crypt::encrypt($data->id));

                $btn = "<div class='btn-group'>";

                $btn .= "<a href='$url_edit' class = 'btn btn-outline-info btn-sm text-nowrap'><i class='fas fa-edit mr-2'></i> Edit</a>";
                $btn .= "</div>";

                return $btn;
            })
            ->toJson();
    }

    public function create()
    {

        return view('lecturers.create');
    }


    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = Lecturer::find($id);
        return view('lecturers.edit', compact('data'));
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
                'nip' => 'required',
                'lecturer_name' => 'required',
                'gender' => 'required'
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

            $user->assignRole([3]);

            $input['name'] = $request->lecturer_name;
            $input['user_id'] = $user->id;

            // Create Data
            Lecturer::create($input);

            // Save Data
            DB::commit();

            // Alert & Redirect
            Alert::toast('Data Berhasil Disimpan', 'success');
            return redirect()->route('lecturer.index');
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

            $request->validate([

                'nip' => 'required',
                'name' => 'required',
                'gender' => 'required'
            ]);

            $id = Crypt::decrypt($id);
            $lecturer = Lecturer::find($id);

            $input = $request->all();

            // Decrypt Data


            // Create Data
            $lecturer->update($input);

            // Save Data
            DB::commit();

            // Alert & Redirect
            Alert::toast('Data Berhasil Disimpan', 'success');
            return redirect()->route('lecturer.index');
        } catch (\Exception $e) {
            // If Data Error
            DB::rollBack();

            // Alert & Redirect
            Alert::toast('Data Tidak Tersimpan', 'error');
            return redirect()->back()->with('error', 'Data Tidak Berhasil Disimpan' . $e->getMessage());
        }
    }
}
