<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class JurnalisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('berita')->insert(
            [
                'isi_berita' => "lorem ipsum",
                'nama_berita' => "lorem ipsum",
                'foto_berita' => "berita.png"
            ]

            );
    }
}