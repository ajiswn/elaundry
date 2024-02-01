<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatabel;

class User extends Authenticatabel
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'username', 'password'];

    public function transaksi()
    {
      return $this->belongsTo(transaksi::class,'id','user_id');
    }

    public function kategori()
    {
      return $this->belongsTo(kategori::class,'id','user_id');
    }
}
