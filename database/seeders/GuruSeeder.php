<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('guru')->insert([
            [
                'nama' => 'Bu Lasminingsih',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pak Lukman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bu erni',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}