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
        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users');
            $table->string('bulan');
            $table->decimal('gaji_pokok', 12, 2);
            $table->decimal('tunjangan', 12, 2)->nullable();
            $table->decimal('bonus', 12, 2)->nullable();
            $table->decimal('potongan', 12, 2)->nullable();
            $table->decimal('bpjs', 12, 2)->nullable();
            $table->decimal('pajak', 12, 2)->nullable();
            $table->decimal('gaji_bersih', 12, 2)->nullable();
            $table->enum('status', ['final', 'draft']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll');
    }
};
