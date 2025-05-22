<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSanksiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori_sanksi')->insert([
            [
                'nama_kategori' => 'Ringan',
                'deskripsi' => 'Pelanggaran kecil yang tidak berdampak besar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Sedang',
                'deskripsi' => 'Pelanggaran yang cukup serius dan membutuhkan pembinaan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Berat',
                'deskripsi' => 'Pelanggaran berat yang bisa mengakibatkan sanksi keras.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}