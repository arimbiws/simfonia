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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('penjual_id');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('pembeli_id');
            $table->unsignedBigInteger('total_harga');
            $table->boolean('status_transaksi');
            $table->string('bukti_bayar');

            $table->softDeletes();

            $table->foreign('penjual_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pembeli_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
