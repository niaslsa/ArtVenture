<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    protected $table = 'properti';
    protected $primarykey = ['id_properti'];
    protected $fillable = ['nama_properti','kondisi_properti','foto_properti', 'penyewaan'];
    public $timestamps = false;
}