<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKonsultasi extends Model
{
    use HasFactory;

    protected $table = 'jadwal_konsultasi';
    protected $fillable = [
        'tanggal_konsultasi',
        'waktu_konsultasi',
        'keterangan',
        'id_dokter',
        'id_profile',
    ];

    protected $casts = [
        'id' => 'integer',
        'id_dokter' => 'integer',
        'id_profile' => 'integer',
    ];

    public function dokter(){
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id');
    }
    public function profile(){
        return $this->belongsTo(Profile::class, 'id_profile', 'id');
    }
}
