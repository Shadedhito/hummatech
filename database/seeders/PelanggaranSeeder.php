<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelanggaranSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pelanggaran')->insert([
            [
                'nama_pelanggaran' => 'Terlambat Masuk Kelas',
                'poin' => 5,
                'deskripsi' => 'Siswa datang setelah jam pelajaran dimulai.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pelanggaran' => 'Tidak Memakai Seragam Lengkap',
                'poin' => 10,
                'deskripsi' => 'Siswa tidak mengenakan atribut seragam sesuai aturan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pelanggaran' => 'Merokok di Lingkungan Sekolah',
                'poin' => 25,
                'deskripsi' => 'Siswa tertangkap merokok di dalam atau sekitar sekolah.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}