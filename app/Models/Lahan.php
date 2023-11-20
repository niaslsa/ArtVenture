<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    use HasFactory;
    protected $table = 'lahan';
    protected $primarykey = ['id_lahan'];
    protected $fillable = ['nama_lahan','lokasi_lahan','foto_lahan'];
    public $timestamps = false;
    protected $casts = [
    ];
}
