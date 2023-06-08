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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->comment('foreign key user');
            $table->string('nim')->comment('nim');
            $table->string('name')->comment('nama');
            $table->string('class')->comment('kelas');
            $table->string('gender')->nullable()->comment('jenis kelamin');
            $table->date('birth_date')->nullable()->comment('tanggal lahir');
            $table->string('birth_place')->nullable()->comment('tempat lahir');
            $table->string('study_program')->comment('program studi');
            $table->string('phone_number')->nullable()->comment('nomor hp');
            $table->string('parent_phone_number')->nullable()->comment('nomor hp orang tua');
            $table->text('address')->nullable()->comment('alamat');
            $table->string('religion')->nullable()->comment('agama');
            $table->integer('entry_year')->comment('tahun masuk');
            $table->string('photo')->nullable()->comment('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
