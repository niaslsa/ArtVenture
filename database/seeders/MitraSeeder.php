<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mitra')->insert(
            [
                'nama_mitra' => 'warung gila',
                'foto_mitra' => 'fabac8980c6dccff96e09f1eb940ad1f.jpg',
                'bisnis_mitra' => 'makanan',
                'kontak_mitra' => 243534
            ]

            );
    }
}
