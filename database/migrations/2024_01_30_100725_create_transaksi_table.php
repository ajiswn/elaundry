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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi');
            $table->unsignedBigInteger('user_id');
            $table->string('tgl_transaksi');
            $table->string('customer');
            $table->enum('status_order',['Proses','Selesai'])->default('Proses');
            $table->string('nama_kategori');
            $table->string('berat');
            $table->string('hari');
            $table->string('harga');
            $table->string('harga_akhir')->nullable();
            $table->string('tgl');
            $table->string('bulan');
            $table->string('tahun');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
