<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    protected $table = 'pelanggaran';
    
    protected $fillable = [
        'nama_pelanggaran',
        'poin',
        'deskripsi'
    ];

    public function sanksi()
    {
        return $this->hasMany(Sanksi::class);
    }
}