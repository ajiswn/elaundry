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
            $table->string('invoice');
            $table->string('user_id');
            $table->string('tgl_transaksi');
            $table->enum('status_order',['Proses','Selesai'])->default('Proses');
            $table->integer('harga_id');
            $table->string('kg');
            $table->string('hari');
            $table->string('harga');
            $table->enum('jenis_pesanan', ['Regular','Expres'])
            $table->string('harga_akhir')->nullable();
            $table->string('tgl');
            $table->string('bulan');
            $table->string('tahun');
            $table->timestamps();
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
