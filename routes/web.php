<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Student
Route::group(['controller' => StudentController::class, 'prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/datatable', 'datatable')->name('datatable');
    Route::post('/store', 'store')->name('store');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/destroy/{id}', 'destroy')->name('destroy');
});

// Lecturer
Route::group(['controller' => LecturerController::class, 'prefix' => 'lecturer', 'as' => 'lecturer.'], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/datatable', 'datatable')->name('datatable');
    Route::post('/store', 'store')->name('store');
    Route::put('/update/{id}', 'update')->name('update');
});

// Course
Route::group(['controller' => CourseController::class, 'prefix' => 'course', 'as' => 'course.'], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/datatable', 'datatable')->name('datatable');
    Route::post('/store', 'store')->name('store');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/destroy/{id}', 'destroy')->name('destroy');
});

// Attendance
Route::group(['controller' => AttendanceController::class, 'prefix' => 'attendance', 'as' => 'attendance.'], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/verification', 'verification')->name('verification');
    Route::get('/show_verification/{id}', 'show_verification')->name('show_verification');
    Route::get('/report', 'report')->name('report');
    Route::get('/create', 'create')->name('create');
    Route::get('/present/{id}', 'present')->name('present');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/datatable', 'datatable')->name('datatable');
    Route::get('/datatable_verification', 'datatable_verification')->name('datatable_verification');
    Route::get('/datatable_report', 'datatable_report')->name('datatable_report');
    Route::post('/store', 'store')->name('store');
    Route::put('/update_verification/{id}', 'update_verification')->name('update_verification');
    Route::delete('/destroy/{id}', 'destroy')->name('destroy');
});

// Schedule
Route::group(['controller' => ScheduleController::class, 'prefix' => 'schedule', 'as' => 'schedule.'], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/datatable', 'datatable')->name('datatable');
    Route::post('/store', 'store')->name('store');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/destroy/{id}', 'destroy')->name('destroy');
});

// User
Route::group(['controller' => UserController::class, 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/datatable', 'datatable')->name('datatable');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/show/{id}', 'show')->name('show');
    Route::post('/store', 'store')->name('store');
    Route::put('/update/{id}', 'update')->name('update');
    Route::put('/update_password/{id}', 'update_password')->name('update_password');
    Route::delete('/destroy/{id}', 'destroy')->name('destroy');
});
