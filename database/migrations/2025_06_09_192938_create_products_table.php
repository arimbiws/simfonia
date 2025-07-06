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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('penjual_id');
            $table->foreignId('unit_bisnis_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('slug');
            $table->string('gambar');
            $table->unsignedBigInteger('harga');
            $table->text('deskripsi');
            $table->softDeletes();

            $table->foreign('penjual_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
