<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Gender
    const GENDER_MAN = "Laki-laki";
    const GENDER_WOMAN = "Perempuan";

    const GENDER_CHOICE = [
        self::GENDER_MAN => self::GENDER_MAN,
        self::GENDER_WOMAN => self::GENDER_WOMAN,
    ];

    // Program Studi
    const STUDY_PROGRAM_D3 = "D3 Manajemen Informatika";
}
