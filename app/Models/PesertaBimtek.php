<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaBimtek extends Model
{
    use HasFactory;
    protected $table = 'peserta_bimtek';
    protected $fillable = ['nama','email','no_hp','alamat','id_bimtek'];


    public function bimtek()
    {
        return $this->belongsTo(BimtekModel::class, 'id_bimtek', 'id');
    }                   

}
