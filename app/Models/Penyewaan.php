<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;
    protected $table = 'penyewaan';
    protected $primarykey = ['id_penyewaan'];
    protected $fillable = ['waktu_penyewaan'];
    public $timestamps = false;
    protected $casts = [
    ];
}
