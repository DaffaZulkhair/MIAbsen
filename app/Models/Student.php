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

    // Kelas
    const CLASS_IA = "IA";
    const CLASS_IB = "IB";
    const CLASS_IC = "IC";
    const CLASS_ID = "ID";
    const CLASS_IE = "IE";
    const CLASS_IF = "IF";
    const CLASS_IM = "IM";
    const CLASS_IN = "IN";
    const CLASS_MIA = "MIA";
    const CLASS_MIB = "MIB";
    const CLASS_MIC = "MIC";
    const CLASS_MID = "MID";
    const CLASS_MIM = "MIM";
    const CLASS_MIN = "MIN";
    const CLASS_MIG = "MIG";

    const CLASS_CHOICE = [
        self::CLASS_IA => self::CLASS_IA,
        self::CLASS_IB => self::CLASS_IB,
        self::CLASS_IC => self::CLASS_IC,
        self::CLASS_ID => self::CLASS_ID,
        self::CLASS_IE => self::CLASS_IE,
        self::CLASS_IF => self::CLASS_IF,
        self::CLASS_IM => self::CLASS_IM,
        self::CLASS_IN => self::CLASS_IN,
        self::CLASS_MIA => self::CLASS_MIA,
        self::CLASS_MIB => self::CLASS_MIB,
        self::CLASS_MIC => self::CLASS_MIC,
        self::CLASS_MID => self::CLASS_MID,
        self::CLASS_MIM => self::CLASS_MIM,
        self::CLASS_MIN => self::CLASS_MIN,
        self::CLASS_MIG => self::CLASS_MIG
    ];

    // Semester
    const SEMESTER_1 = "1";
    const SEMESTER_2 = "2";
    const SEMESTER_3 = "3";
    const SEMESTER_4 = "4";
    const SEMESTER_5 = "5";
    const SEMESTER_6 = "6";
    const SEMESTER_7 = "7";
    const SEMESTER_8 = "8";

    const SEMESTER_CHOICE = [
        self::SEMESTER_1 => self::SEMESTER_1,
        self::SEMESTER_2 => self::SEMESTER_2,
        self::SEMESTER_3 => self::SEMESTER_3,
        self::SEMESTER_4 => self::SEMESTER_4,
        self::SEMESTER_5 => self::SEMESTER_5,
        self::SEMESTER_6 => self::SEMESTER_6,
        self::SEMESTER_7 => self::SEMESTER_7,
        self::SEMESTER_8 => self::SEMESTER_8,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
