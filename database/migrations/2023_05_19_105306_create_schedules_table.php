<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('class')->comment('kelas');
            $table->bigInteger('course_id')->comment('foreign key course');
            $table->string('course_name')->comment('nama mata kuliah')->nullable();
            $table->bigInteger('lecturer_id')->comment('foreign key lecturer');
            $table->string('lecturer_name')->comment('nama dosen')->nullable();
            $table->date('date')->comment('hari');
            $table->time('time_start')->comment('jam mulai');
            $table->time('time_end')->comment('jam selesai');
            $table->text('subject')->nullable()->comment('pokok bahasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
