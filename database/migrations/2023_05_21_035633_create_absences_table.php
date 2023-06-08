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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('attendance_id')->comment('foreign key attendance');
            $table->string('type')->comment('tipe perizinan (izin/sakit)');
            $table->text('description')->comment('keterangan izin');
            $table->string('file')->comment('lampiran file');
            $table->boolean('is_verified')->nullable()->comment('apakah di verif atau tidak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
