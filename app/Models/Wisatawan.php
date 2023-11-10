<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisatawan extends Model
{
    use HasFactory;
    protected $table = 'wisatawan';
    protected $primarykey = ['id_akun'];
    protected $fillable = ['nama_wisatawan','kontak_wisatawan'];
    public $timestamps = false;
    protected $casts = [
    ];
}
