<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    use HasFactory;
    protected $table = 'properti';
    protected $primarykey = ['id_properti'];
    protected $fillable = ['id_ss','id_wisatawan','id_penyewaan','nama_properti','kondisi_properti','foto_properti'];
    public $timestamps = false;
    protected $casts = [
    ];
}
