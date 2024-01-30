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
        Schema::create('tb_data_transaksi', function (Blueprint $table) {
            $table->id('no_pesanan');
            $table->integer('berat');
            $table->enum('jenis_pesanan', ['Regular', 'Expres'])->default('Regular');
            $table->integer('harga');
            $table->string('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_data_transaksi');
    }
};
