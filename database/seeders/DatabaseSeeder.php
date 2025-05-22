<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Guru;
use App\Models\Pelanggaran;
use App\Models\KategoriSanksi;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'wewe',
            'email' => 'anjay@gmail.com',
            'password' => Hash::make('adith2309'),
        ]);
    }
}