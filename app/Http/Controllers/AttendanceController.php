<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Schedule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\Schema;

class AttendanceController extends Controller
{
    public function index()
    {
        // Confirm Delete Alert
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin menghapus data? Data yang dihapus tidak dapat dikembalikan";
        confirmDelete($title, $text);

        return view('attendances.index');
    }

    public function verification()
    {
        return view('attendances.verification');
    }

    public function show_verification($id)
    {
        $id = Crypt::decrypt($id);
        $data = Attendance::find($id);

        return view('attendances.verification', compact('data'));
    }

    public function datatable()
    {
        $model = Attendance::query();

        return DataTables::of($model)
            ->editColumn('created_at', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->translatedFormat('d F Y - H:i');
                return $formatedDate;
            })
            ->addColumn('action', function ($data) {
                $url_show = route('attendance.show', Crypt::encrypt($data->id));
                $url_edit = route('attendance.edit', Crypt::encrypt($data->id));
                $url_delete = route('attendance.destroy', Crypt::encrypt($data->id));

                $btn = "<div class='btn-group'>";
                $btn .= "<a href='$url_show' class = 'btn btn-outline-info btn-sm text-nowrap'><i class='fas fa-info mr-2'></i> Detail</a>";
                $btn .= "<a href='$url_edit' class = 'btn btn-outline-info btn-sm text-nowrap'><i class='fas fa-edit mr-2'></i> Edit</a>";
                $btn .= "<a href='$url_delete' class = 'btn btn-outline-danger btn-sm text-nowrap' data-confirm-delete='true'><i class='fas fa-trash mr-2'></i> Hapus</a>";
                $btn .= "</div>";

                return $btn;
            })
            ->toJson();
    }


    public function datatable_verification()
    {
        $model = Attendance::where('status', Attendance::STATUS_NOT_CONFIRMED);

        return DataTables::of($model)
            ->editColumn('created_at', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->translatedFormat('d F Y - H:i');
                return $formatedDate;
            })
            ->addColumn('action', function ($data) {
                $url_verification = route('attendance.show_verification', Crypt::encrypt($data->id));

                $btn = "<div class='btn-group'>";
                $btn .= "<a href='$url_verification' class = 'btn btn-outline-info btn-sm text-nowrap'><i class='fas fa-check mr-2'></i> Verifikasi</a>";
                $btn .= "</div>";

                return $btn;
            })
            ->toJson();
    }

    public function create()
    {
        $today = Carbon::today()->format('Y-m-d');

        $user_id = Auth::user()->id;
        $student = Student::where('user_id', $user_id)->first();

        $schedules = Schedule::where('date', $today)
            ->where('class', $student->class)
            ->get();

        $attendance = Attendance::where('student_id', $student->id)
            ->whereDate('created_at', $today)
            ->first();

        foreach ($schedules as $item) {
            $item->date = Carbon::parse($item->date)->isoFormat('d MMMM Y');
            $item->time_start = Carbon::parse($item->time_start)->translatedFormat('H:i');
            $item->time_end = Carbon::parse($item->time_end)->translatedFormat('H:i');
        }

        return view('attendances.create', compact('schedules', 'attendance'));
    }

    public function present($id)
    {
        $id = Crypt::decrypt($id);
        $data = Schedule::find($id);

        $user_id = Auth::user()->id;
        $student = Student::where('user_id', $user_id)->first();

        return view('attendances.present', compact('data', 'student'));
    }
}
