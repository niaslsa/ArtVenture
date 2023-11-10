<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primarykey = ['id_berita'];
    protected $fillable = ['id_jurnalis','nama_berita','isi_berita'];
    public $timestamps = false;
    protected $casts = [
    ];
}
