<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class propertiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properti')->insert(
            [
                'nama_properti' => 'Baju',
                'kondisi_properti' => 'baik',
                'foto_properti' => Faker::create()->image()
            ]
        );
    }
}
