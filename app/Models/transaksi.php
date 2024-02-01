<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['user_id','no_transaksi','tgl_transaksi', 'status_order', 'harga_id', 'kg', 'hari', 'harga', 'tgl','bulan', 'tahun', 'harga_akhir'];

    public function price()
    {
      return $this->belongsTo(kategori::class,'harga_id','id');
    }

    public function user()
    {
      return $this->belongsTo(User::class,'user_id','id');
    }
}
