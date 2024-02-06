<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = 'tiket';
    protected $primarykey = ['id_tiket'];
    protected $fillable = ['id_wisatawan','id_st','id_pemesanan','jenis_tiket'];
    public $timestamps = false;
    protected $casts = [
    ];
}
