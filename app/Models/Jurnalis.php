<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnalis extends Model
{
    use HasFactory;
    protected $table = 'jurnalis';
    protected $primarykey = ['id_jurnalis'];
    protected $fillable = ['id_akun','nama_jurnalis','kontak_jurnalis','foto_jurnalis'];
    public $timestamps = false;
    protected $casts = [
    ];
}
