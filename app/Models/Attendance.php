<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const STATUS_NOT_CONFIRMED = "Menunggu Verifikasi";
    const STATUS_PRESENT = "Hadir";
    const STATUS_ABSENT = "Tidak Hadir";
    const STATUS_LATE = "Terlambat";
    const STATUS_SICK = "Sakit";
    const STATUS_PERMIT = "Izin";

    const STATUS_CHOICE = [
        self::STATUS_PRESENT => self::STATUS_PRESENT,
        self::STATUS_SICK => self::STATUS_SICK,
        self::STATUS_PERMIT => self::STATUS_PERMIT,
    ];
}
