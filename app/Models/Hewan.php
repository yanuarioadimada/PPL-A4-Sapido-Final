<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hewan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'hewan';
    protected $fillable = [
        'jenis_kelamin',
        'keterangan',
        'jenis_hewan',
        'id_induk',
        'nomor_hewan',
        'gambar',
        'id_profile'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_jenis_hewan' => 'integer',
        'id_induk' => 'integer',
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'id_profile', 'id');
    }

    public function induk(): BelongsTo
    {
        return $this->belongsTo(Hewan::class, 'id_induk', 'id');
    }
    
}
