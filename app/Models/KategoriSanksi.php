<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriSanksi extends Model
{
    protected $table = 'kategori_sanksi';
    
    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    public function sanksi()
    {
        return $this->hasMany(Sanksi::class);
    }
}
