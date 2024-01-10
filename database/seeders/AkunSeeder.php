<?php

namespace Database\Seeders;

use App\Models\Akun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        {
            $userData = [
                [
                    'username' => 'admin',
                    'role' => 'super_admin',
                    'password' => Hash::make('123')
                ],
                [
                    'username' => 'mitra',
                    'role' => 'mitra',
                    'password' => Hash::make('123')
                ],
                [
                    'username' => 'jurnalis',
                    'role' => 'jurnalis',
                    'password' => Hash::make('123')
                ],
                [
                    'username' => 'tiketing',
                    'role' => 'staff_ticketing',
                    'password' => Hash::make('123')
                ],
                [
                    'username' => 'sarana',
                    'role' => 'staff_sarana',
                    'password' => Hash::make('123')
                ],
                [
                    'username' => 'nafesa',
                    'role' => 'jurnalis',
                    'password' => Hash::make('jurnalis')
                ]

            ];
    
            // Melakukan looping data dengan foreach
            foreach ($userData as $user => $val) {
                Akun::create($val);
            }
        }
    }
}
