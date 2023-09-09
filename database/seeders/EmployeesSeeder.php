<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Create seeder:
// php artisan make:seeder CategoriesSeeder

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('employees')->insert([
            'proceedings' => 201626975,
            'name' => 'Luis Pablo Canul Garcia',
            'birthdate' => '1998-11-03',
            'rfc' => 'cagl119804132',
            'email' => 'wichocanul07@gmail.com',
            'phone' => '2222761817'
        ]);
        DB::table('employees')->insert([
            'proceedings' => 202211582,
            'name' => 'Dua Lipa',
            'birthdate' => '1996-10-22',
            'rfc' => 'a7djfr2531096',
            'email' => 'algorandom@gmail.com',
            'phone' => '2221564573'
        ]);
        DB::table('employees')->insert([
            'proceedings' => 202174923,
            'name' => 'Guillermo Ochoa',
            'birthdate' => '1992-03-29',
            'rfc' => 'g8ar329nfg512',
            'email' => '8a@gmail.com',
            'phone' => '2221566296'
        ]);
    }
}
