<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananTiket extends Model
{
    use HasFactory;
    protected $table = 'pemesanan_tiket';
    protected $primarykey = ['id_pemesanan'];
    protected $fillable = ['id_st','tanggal_pemesanan','jumlah_pemesanan','detail_pemesanan'];
    public $timestamps = false;
    protected $casts = [
    ];
}
