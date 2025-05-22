<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SanksiSiswa extends Model
{
    public function siswa()
    {
    return $this->belongsTo(Siswa::class);
    }
}
