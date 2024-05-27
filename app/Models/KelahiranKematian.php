<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KelahiranKematian extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'kelahiran_kematian';
    protected $fillable = [
        'tanggal',
        'jenis',
        'keterangan',
        'id_hewan',
        'gambar',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tanggal' => 'date',
        'id_hewan' => 'integer',
    ];

    public function hewan(): BelongsTo
    {
        return $this->belongsTo(Hewan::class, 'id_hewan', 'id');
    }
}
