<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    
    protected $fillable = [
        'nama',
        'nip',
    ];

    public function sanksi()
    {
        return $this->hasMany(Sanksi::class);
    }
}