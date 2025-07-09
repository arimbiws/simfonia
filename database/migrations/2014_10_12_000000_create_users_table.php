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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('pembeli');
            $table->string('tipe_pembeli')->default('eksternal')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('nik_nim');
            $table->string('password');
            $table->unsignedBigInteger('no_hp');
            $table->string('alamat');
            $table->string('nama_bank');
            $table->string('nama_akun_bank');
            $table->unsignedBigInteger('nomor_rekening');
            $table->string('surat_persetujuan')->nullable(); // khusus penjual
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
