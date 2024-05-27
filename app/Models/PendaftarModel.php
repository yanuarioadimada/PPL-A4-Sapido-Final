<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarModel extends Model
{
    use HasFactory;
    protected $table = 'pendaftar';
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'email',
        'surat_ajuan',
        'foto',
        'status',
        'password'
    ];
}
