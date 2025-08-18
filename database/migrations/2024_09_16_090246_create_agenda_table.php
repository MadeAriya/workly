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
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users');
            $table->string('waktu');
            $table->string('nama');
            $table->string('tempat');
            $table->string('agenda');
            $table->string('pelaksanaan_kegiatan');
            $table->string('hasil_kegiatan');
            $table->string('dokumentasi_1')->nullable();
            $table->string('dokumentasi_2')->nullable();
            $table->string('dokumentasi_3')->nullable();
            $table->integer('skor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
