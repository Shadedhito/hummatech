<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SanksiSiswa;

class SanksiSiswaSeeder extends Seeder
{
    public function run(): void
    {
        SanksiSiswa::create([
            'siswa_id' => 1,
            'jenis_pelanggaran' => 'Tidak memakai seragam',
            'poin' => 10,
            'keterangan' => 'Kejadian di hari Senin saat upacara',
        ]);

        SanksiSiswa::create([
            'siswa_id' => 2,
            'jenis_pelanggaran' => 'Terlambat datang',
            'poin' => 5,
            'keterangan' => 'Datang jam 08.00 WIB',
        ]);
    }
}