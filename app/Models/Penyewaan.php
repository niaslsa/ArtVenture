<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;
    protected $table = 'penyewaan';
    protected $primarykey = ['id_penyewaan'];
    protected $fillable = ['id_lahan', 'nama_lahan', 'lokasi_lahan', 'foto_lahan', 'id_properti', 'nama_properti', 'kondisi_properti', 'foto_properti'];
    public $timestamps = false;
}
