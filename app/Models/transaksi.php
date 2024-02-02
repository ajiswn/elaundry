<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','no_transaksi','tgl_transaksi','customer', 'status_order', 'nama_kategori','berat', 'hari', 'harga', 'tgl','bulan', 'tahun', 'harga_akhir'];

    public function user()
    {
      return $this->belongsTo(User::class,'user_id','id');
    }
}
