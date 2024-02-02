<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id','nama_kategori','harga','hari'
    ];


    public function harga()
    {
      return $this->belongsTo(User::class,'user_id','id');
    }

}
