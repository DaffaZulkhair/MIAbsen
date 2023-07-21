<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Program Studi
    const STUDY_PROGRAM_D3 = "D3 Manajemen Informatika";
    const STUDY_PROGRAM_D4 = "D4 Manajemen Informatika";

    const STUDY_PROGRAM_CHOICE = [
        self::STUDY_PROGRAM_D3 => self::STUDY_PROGRAM_D3,
        self::STUDY_PROGRAM_D4 => self::STUDY_PROGRAM_D4,
    ];
}
