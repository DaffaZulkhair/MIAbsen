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
    const STUDY_PROGRAM_D4 = "D4 Manajemen Informatika";

    const STUDY_PROGRAM_CHOICE = [
        self::STUDY_PROGRAM_D3 => self::STUDY_PROGRAM_D3,
        self::STUDY_PROGRAM_D4 => self::STUDY_PROGRAM_D4,
    ];

    // Agama
    const AGAMA_ISLAM = "Islam";
    const AGAMA_KRISTEN = "Kristen";
    const AGAMA_KATOLIK = "Katolik";
    const AGAMA_BUDDHA = "Buddha";
    const AGAMA_HINDU = "Hindu";
    const AGAMA_KONGHUCU = "Konghucu";

    const AGAMA_CHOICE = [
        self::AGAMA_ISLAM => self::AGAMA_ISLAM,
        self::AGAMA_KRISTEN => self::AGAMA_KRISTEN,
        self::AGAMA_KATOLIK => self::AGAMA_KATOLIK,
        self::AGAMA_BUDDHA => self::AGAMA_BUDDHA,
        self::AGAMA_HINDU => self::AGAMA_HINDU,
        self::AGAMA_KONGHUCU => self::AGAMA_KONGHUCU,

    ];
}
