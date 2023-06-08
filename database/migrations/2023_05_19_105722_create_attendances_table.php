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
            $table->bigInteger('user_id')->comment('foreign key user');
            $table->bigInteger('schedule_id')->comment('foreign key schedule');
            $table->text('subject')->nullable()->comment('pokok bahasan');
            $table->integer('total_hour')->nullable()->comment('jumlah jam');
            $table->integer('score_hour')->nullable()->comment('nilai dari jumlah jam');
            $table->string('latitude')->nullable()->comment('latitude');
            $table->string('longitude')->nullable()->comment('longitude');
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
