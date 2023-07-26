<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Attendance;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole('Mahasiswa')) {
            $user_id = Auth::user()->id;
            $student = Student::where('user_id', $user_id)->first();

            return view('home', compact('student'));
        } else {
            $totalStudent = Student::all()->count();
            $totalLecturer = Lecturer::all()->count();
            $totalAttendance = Attendance::all()->count();
            $totalSchedule = Schedule::all()->count();
            return view('home', compact('totalStudent', 'totalLecturer', 'totalAttendance', 'totalSchedule'));
        }
    }
}
