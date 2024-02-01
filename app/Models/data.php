<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{
	protected $table = 'tb_data_transaksi';
    protected $fillable = ['no_pesanan', 'berat', 'jenis_pesanan', 'harga', 'tanggal'];
    use HasFactory;
}
