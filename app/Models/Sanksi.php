<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    protected $table = 'sanksi';
    
    protected $fillable = [
    'user_id',
    'pelanggaran_id',
    'guru_id',
    'kategori_sanksi_id',
    'tanggal_kejadian',
    'poin',
];
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    
    public function pelanggaran()
    {
        return $this->belongsTo(Pelanggaran::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function kategoriSanksi()
    {
        return $this->belongsTo(KategoriSanksi::class);
    }
}