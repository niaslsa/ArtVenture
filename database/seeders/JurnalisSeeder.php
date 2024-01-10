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
                'nama_berita' => 'adanya diskon',
                'foto_berita' => 'fabac8980c6dccff96e09f1eb940ad1f.jpg',
                'kontak_berita' => 243534
            ]

            );
    }
}
