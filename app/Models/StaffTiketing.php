<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffTiketing extends Model
{
    use HasFactory;
    protected $table = 'staff_tiketing';
    protected $primarykey = ['id_st'];
    protected $fillable = ['id_akun','nama_st','kontak_st','foto_st'];
    public $timestamps = false;
    protected $casts = [
    ];
}
