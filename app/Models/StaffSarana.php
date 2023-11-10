<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffSarana extends Model
{
    use HasFactory;
    protected $table = 'staff_sarana';
    protected $primarykey = ['id_ss'];
    protected $fillable = ['id_akun','nama_ss','kontak_ss','foto_ss'];
    public $timestamps = false;
    protected $casts = [
    ];
}
