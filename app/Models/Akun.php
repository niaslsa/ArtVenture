<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Akun extends Authenticatable
{
    use HasFactory;
    protected $table = 'akun';
    protected $primarykey = ['id_akun'];
    protected $fillable = ['username','password','role'];
    public $timestamps = false;
    protected $casts = [
        'password' => 'hashed',
    ];
}
