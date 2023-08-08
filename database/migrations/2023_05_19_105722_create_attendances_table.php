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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->comment('foreign key user');
            $table->string('student_name')->nullable()->comment('student_name');
            $table->string('student_class')->nullable()->comment('student_class');
            $table->bigInteger('schedule_id')->comment('foreign key schedule');
            $table->string('schedule_course_name')->nullable()->comment('mata kuliah');
            $table->string('schedule_lecturer_name')->nullable()->comment('dosen');
            $table->integer('total_hour')->nullable()->comment('jumlah jam');
            $table->integer('score_hour')->nullable()->comment('nilai dari jumlah jam');
            $table->string('latitude')->nullable()->comment('latitude');
            $table->string('longitude')->nullable()->comment('longitude');
            $table->string('status')->comment('status');
            $table->string('file')->nullable()->comment('lampiran file');
            $table->text('reason')->nullable()->comment('alasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
