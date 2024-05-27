<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BimtekModel extends Model
{
    use HasFactory;
    protected $table = 'bimtek';
    protected $fillable = ['gambar','judul', 'tanggal', 'deskripsi', 'status', 'id_admin'];
}
