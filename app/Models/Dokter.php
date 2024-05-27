<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';
    protected $fillable = [
        'nama',
        'alamat',
        'no_telepon',
        'foto_profil',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public function jadwal(){
        return $this->hasMany(JadwalKonsultasi::class, 'id_dokter', 'id');
    }
}
