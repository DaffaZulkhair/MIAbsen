<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

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

        return view('attendances.show_verification', compact('data'));
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data = Attendance::find($id);

        return view('attendances.show', compact('data'));
    }

    public function report()
    {
        return view('attendances.report');
    }

    public function datatable_report()
    {
        $model = Attendance::query();

        return DataTables::of($model)
            ->editColumn('created_at', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->translatedFormat('d F Y - H:i');
                return $formatedDate;
            })
            ->toJson();
    }

    public function datatable()
    {
        if (Auth::user()->hasRole('Mahasiswa')) {
            $user_id = Auth::user()->id;
            $student = Student::where('user_id', $user_id)->first();

            $model = Attendance::where('student_id', $student->id)->orderBy('id', 'desc');
        } else {
            $model = Attendance::query();
        }

        return DataTables::of($model)
            ->editColumn('created_at', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->translatedFormat('d F Y - H:i');
                return $formatedDate;
            })
            ->addColumn('action', function ($data) {
                $url_show = route('attendance.show', Crypt::encrypt($data->id));
                $url_delete = route('attendance.destroy', Crypt::encrypt($data->id));

                $btn = "<div class='btn-group'>";
                $btn .= "<a href='$url_show' class = 'btn btn-outline-info btn-sm text-nowrap'><i class='fas fa-info mr-2'></i> Detail</a>";

                if (Auth::user()->hasanyRole('Mahasiswa|Pimpinan')) {
                } else {
                    $btn .= "<a href='$url_delete' class = 'btn btn-outline-danger btn-sm text-nowrap' data-confirm-delete='true'><i class='fas fa-trash mr-2'></i> Hapus</a>";
                }

                $btn .= "</div>";

                return $btn;
            })
            ->toJson();
    }

    public function datatable_verification()
    {
        $model = Attendance::where('status', Attendance::STATUS_CANT_PRESENT)
            ->orWhere('status', Attendance::STATUS_NOT_CONFIRMED_PRESENT)
            ->orWhere('status', Attendance::STATUS_NOT_CONFIRMED_PERMIT);

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

    public function update_verification($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $id = Crypt::decrypt($id);
            $attendance = Attendance::find($id);

            if ($request->type == Attendance::STATUS_ABSENT) {
                $score_hour = $attendance->total_hour * 50;
            } else {
                $score_hour = 0;
            }

            if ($request->type == Attendance::STATUS_ABSENT) {
                $attendance->update([
                    'score_hour' => $score_hour,
                    'status' => Attendance::STATUS_ABSENT
                ]);
            } elseif ($request->type == Attendance::STATUS_PRESENT) {
                $attendance->update([
                    'score_hour' => $score_hour,
                    'status' => Attendance::STATUS_PRESENT
                ]);
            } elseif ($request->type == Attendance::STATUS_LATE) {
                $attendance->update([
                    'score_hour' => $score_hour,
                    'status' => Attendance::STATUS_LATE
                ]);
            } elseif ($request->type == Attendance::STATUS_PERMIT) {
                $attendance->update([
                    'score_hour' => $score_hour,
                    'status' => Attendance::STATUS_PERMIT
                ]);
            } elseif ($request->type == Attendance::STATUS_SICK) {
                $attendance->update([
                    'score_hour' => $score_hour,
                    'status' => Attendance::STATUS_SICK
                ]);
            }

            // Save Data
            DB::commit();

            // Alert & Redirect
            Alert::toast('Data Berhasil Disimpan', 'success');
            return redirect()->route('attendance.verification');
        } catch (\Exception $e) {
            // If Data Error
            DB::rollBack();

            // Alert & Redirect
            Alert::toast('Data Gagal Disimpan', 'error');
            return redirect()->back()->withInput()->with('error', 'Data Tidak Berhasil Diperbarui' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $today = Carbon::now()->format('Y-m-d');
            $time_today = Carbon::now()->format('H:i:s');
            $date = $request->schedule_date;

            $time_start = Carbon::parse($request->schedule_time_start);
            $get_time_end = Carbon::parse($request->schedule_time_end);
            $time_end = $get_time_end->addMinutes(15);

            $latitude = $request->latitude;
            $longitude = $request->longitude;

            $latitude_mi = -2.978490812012596;
            $longitude_mi  = 104.73134556182045;

            $schedule_id = Crypt::decrypt($request->schedule_id);
            $schedule_course_id = Crypt::decrypt($request->schedule_course_id);

            $course = Course::find($schedule_course_id);

            $user_id = Auth::user()->id;
            $student = Student::where('user_id', $user_id)->first();

            if ($request->type == Attendance::STATUS_PRESENT) {
                if ($date == $today) {
                    if ($time_today >= $time_start || $time_today <= $time_end) {
                        $jarak = $this->haversine($latitude, $longitude, $latitude_mi, $longitude_mi);
                        $jarakThreshold = 5;
                        if ($jarak <= $jarakThreshold) {
                            Attendance::create([
                                'student_id' => $student->id,
                                'student_name' => $student->name,
                                'schedule_id' => $schedule_id,
                                'schedule_course_name' => $request->schedule_course_name,
                                'schedule_lecturer_name' => $request->schedule_lecturer_name,
                                'total_hour' => $course->total_hour,
                                'latitude' => $latitude,
                                'longitude' => $longitude,
                                'status' => Attendance::STATUS_NOT_CONFIRMED_PRESENT
                            ]);
                        } else {
                            // If Data Error
                            DB::rollBack();

                            // Alert & Redirect
                            Alert::toast('Anda harus berada dalam radius 5 meter dari lokasi absen.', 'error');
                            return redirect()->back();
                        }
                    } else {
                        // If Data Error
                        DB::rollBack();

                        // Alert & Redirect
                        Alert::toast('Tidak Dapat Melakukan Presensi', 'error');
                        return redirect()->back();
                    }
                } else {
                    // If Data Error
                    DB::rollBack();

                    // Alert & Redirect
                    Alert::toast('Tidak Dapat Melakukan Presensi', 'error');
                    return redirect()->back();
                }
            } elseif ($request->type == Attendance::STATUS_CANT_PRESENT) {
                Attendance::create([
                    'student_id' => $student->id,
                    'student_name' => $student->name,
                    'schedule_id' => $schedule_id,
                    'schedule_course_name' => $request->schedule_course_name,
                    'schedule_lecturer_name' => $request->schedule_lecturer_name,
                    'total_hour' => $course->total_hour,
                    'status' => Attendance::STATUS_CANT_PRESENT
                ]);
            } else {
                // Save File
                if ($file = $request->file('file')) {
                    $destinationPath = 'assets/files/';
                    $fileName = "SURAT" . "_" . $student->nim . date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath, $fileName);
                }

                Attendance::create([
                    'student_id' => $student->id,
                    'student_name' => $student->name,
                    'schedule_id' => $schedule_id,
                    'schedule_course_name' => $request->schedule_course_name,
                    'schedule_lecturer_name' => $request->schedule_lecturer_name,
                    'total_hour' => $course->total_hour,
                    'status' => Attendance::STATUS_NOT_CONFIRMED_PERMIT,
                    'file' => $fileName,
                    'reason' => $request->reason
                ]);
            }

            // Save Data
            DB::commit();

            // Alert & Redirect
            Alert::toast('Data Berhasil Disimpan', 'success');
            return redirect()->route('attendance.create');
        } catch (\Exception $e) {
            // If Data Error
            DB::rollBack();

            // Alert & Redirect
            Alert::toast('Data Gagal Disimpan', 'error');
            return redirect()->back()->withInput()->with('error', 'Data Tidak Berhasil Diperbarui' . $e->getMessage());
        }
    }

    private function haversine($lat1, $lon1, $lat2, $lon2)
    {
        // Menghitung jarak antara dua titik koordinat menggunakan Haversine formula.
        // Anda dapat menemukan implementasi rumus Haversine di banyak sumber online.
        // Berikut adalah contoh implementasi sederhana:
        $r = 6371; // Radius Bumi dalam km
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $r * $c * 1000; // Mengubah jarak menjadi meter

        return $d;
    }
}
