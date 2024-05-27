<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penyakit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'penyakit';
    protected $fillable = [
        'gejala',
        'keterangan',
        'id_hewan',
        'status',
        'gambar',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_hewan' => 'integer',
    ];

    public function hewan(): BelongsTo
    {
        return $this->belongsTo(Hewan::class, 'id_hewan', 'id');
    }
}
