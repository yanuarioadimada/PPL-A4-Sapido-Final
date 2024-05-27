<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TumbuhKembang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tumbuh_kembang';
    protected $fillable = [
        'umur',
        'tinggi',
        'berat_badan',
        'jumlah_gigi',
        'gambar',
        'keterangan',
        'status',
        'id_hewan',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function hewan()
    {
        return $this->belongsTo(Hewan::class, 'id_hewan', 'id');
    }
    
}
