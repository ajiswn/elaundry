<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatabel;

class User extends Authenticatabel
{
    use HasFactory;

    protected $table = 'tb_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['nama', 'username', 'password'];
}
