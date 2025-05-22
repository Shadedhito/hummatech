<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        Siswa::create([
            'nama' => 'Ahmad Syahril',
            'nisn' => '0012345678',
        ]);

        Siswa::create([
            'nama' => 'Dinda Putri',
            'nisn' => '0012345679',
        ]);

        Siswa::create([
            'nama' => 'Rama Fadillah',
            'nisn' => '0012345680',
        ]);
    }
}