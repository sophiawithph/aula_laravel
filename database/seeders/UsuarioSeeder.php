<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produtos')->insert([
            [
                'name' => 'Alana',
                'email' => 'alana@gmail.com',
                'password' => 'alaninha',
            ],
            [
                'name' => 'Athena',
                'email' => 'athena@gmail.com',
                'password' => 'athena',
            ]
        ]);
    }
}
