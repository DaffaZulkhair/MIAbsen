<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const STATUS_NOT_CONFIRMED_PRESENT = "Menunggu Verifikasi (Hadir)";
    const STATUS_NOT_CONFIRMED_PERMIT = "Menunggu Verifikasi (Izin/Sakit)";
    const STATUS_CANT_PRESENT = "Hadir";
    const STATUS_PRESENT = "Hadir";
    const STATUS_ABSENT = "Tidak Hadir";
    const STATUS_LATE = "Terlambat";
    const STATUS_SICK = "Sakit";
    const STATUS_PERMIT = "Izin";

    const STATUS_CHOICE = [
        self::STATUS_CANT_PRESENT => self::STATUS_CANT_PRESENT,
        self::STATUS_SICK => self::STATUS_SICK,
        self::STATUS_PERMIT => self::STATUS_PERMIT,
        // self::STATUS_PRESENT => self::STATUS_PRESENT,
    ];

    const STATUS_ADMIN_CHOICE = [
        self::STATUS_CANT_PRESENT => self::STATUS_CANT_PRESENT,
        self::STATUS_SICK => self::STATUS_SICK,
        self::STATUS_PERMIT => self::STATUS_PERMIT,
        self::STATUS_ABSENT => self::STATUS_ABSENT,
        self::STATUS_LATE => self::STATUS_LATE,
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }
}
