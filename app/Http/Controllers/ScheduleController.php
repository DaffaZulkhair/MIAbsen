<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        // Confirm Delete Alert
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('schedules.index');
    }

    public function datatable()
    {
        $model = Schedule::query();

        return DataTables::of($model)
            ->editColumn('date', function ($data) {
                return Carbon::parse($data->date)->isoFormat('dddd, D MMMM Y');
            })
            ->editColumn('time_start', function ($data) {
                return Carbon::parse($data->time_start)->format('H:i');
            })
            ->editColumn('time_end', function ($data) {
                return Carbon::parse($data->time_end)->format('H:i');
            })
            ->addColumn('action', function ($data) {

                $url_edit = route('schedule.edit', Crypt::encrypt($data->id));
                $url_delete = route('schedule.destroy', Crypt::encrypt($data->id));

                $btn = "<div class='btn-group'>";
                if (Auth::user()->hasrole('Admin')) {
                    $btn .= "<a href='$url_edit' class = 'btn btn-outline-info btn-sm text-nowrap'><i class='fas fa-edit mr-2'></i> Edit</a>";
                    $btn .= "<a href='$url_delete' class = 'btn btn-outline-danger btn-sm text-nowrap' data-confirm-delete='true'><i class='fas fa-trash mr-2'></i> Hapus</a>";
                } elseif (Auth::user()->hasRole('Dosen')) {
                    $btn .= "<a href='$url_edit' class = 'btn btn-outline-info btn-sm text-nowrap'><i class='fas fa-edit mr-2'></i> Detail</a>";
                }

                $btn .= "</div>";

                return $btn;
            })
            ->toJson();
    }

    public function create()
    {
        $lecturers = Lecturer::all();
        $courses = Course::all();
        return view('schedules.create', compact('lecturers', 'courses'));
    }


    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = Schedule::find($id);
        $lecturers = Lecturer::all();
        $courses = Course::all();
        return view('schedules.edit', compact('data', 'lecturers', 'courses'));
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'course_id' => 'required',
                'lecturer_id' => 'required',
                'date' => 'required',
                'time_start' => 'required',
                'time_end' => 'required',
            ]);

            $input = $request->all();

            $input['course_id'] = Crypt::decrypt($input['course_id']);
            $input['lecturer_id'] = Crypt::decrypt($input['lecturer_id']);

            $input['class'] = $request->semester . " " . $request->class;

            // Create Data
            $schedule =  Schedule::create($input);

            $schedule->update([
                'course_name' => $schedule->course->name,
                'lecturer_name' => $schedule->lecturer->name,
            ]);

            // Save Data
            DB::commit();

            // Alert & Redirect
            Alert::toast('Data Berhasil Disimpan', 'success');
            return redirect()->route('schedule.index');
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
                'course_id' => 'required',
                'lecturer_id' => 'required',
                'date' => 'required',
                'time_start' => 'required',
                'time_end' => 'required',
            ]);

            $id = Crypt::decrypt($id);
            $schedule = Schedule::find($id);

            $input = $request->all();

            $input['course_id'] = Crypt::decrypt($input['course_id']);
            $input['lecturer_id'] = Crypt::decrypt($input['lecturer_id']);

            // Update Data
            $schedule->update($input);

            $schedule->update([
                'course_name' => $schedule->course->name,
                'lecturer_name' => $schedule->lecturer->name,
            ]);

            // Save Data
            DB::commit();

            // Alert & Redirect
            Alert::toast('Data Berhasil Disimpan', 'success');
            return redirect()->route('schedule.index');
        } catch (\Exception $e) {
            // If Data Error
            DB::rollBack();

            // Alert & Redirect
            Alert::toast('Data Tidak Tersimpan', 'error');
            return redirect()->back()->with('error', 'Data Tidak Berhasil Disimpan' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            // Delete Data
            $id = Crypt::decrypt($id);
            $schedule = Schedule::find($id);

            $schedule->delete();

            // Save Data
            DB::commit();

            // Alert & Redirect
            Alert::toast('Data Berhasil Dihapus', 'success');
            return redirect()->route('schedule.index');
        } catch (\Exception $e) {
            // If Data Error
            DB::rollBack();

            // Alert & Redirect
            Alert::toast('Data Gagal Dihapus', 'error');
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus' . $e->getMessage());
        }
    }
}
