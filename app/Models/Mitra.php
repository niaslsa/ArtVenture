<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';
    protected $primarykey = 'id_mitra';
    protected $fillable = ['nama_mitra','foto_mitra','bisnis_mitra','kontak_mitra'];
    public $timestamps = false;
    // protected $casts = [
    // ];
}
