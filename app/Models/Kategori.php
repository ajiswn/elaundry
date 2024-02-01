<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    protected $fillable = [
        'user_id','nama_kategori','harga','hari'
    ];

    public function transaksi()
    {
      return $this->hasMany(transaksi::class);
    }

    public function harga()
    {
      return $this->belongsTo(User::class,'user_id','id');
    }

}
