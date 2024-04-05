<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;

class Pangkat extends Model
{
    use HasFactory;

    protected $fillable = [
        'golongan',
        'nama'
    ];

    // public function pegawais()
    // {
    //     return $this->hasMany(Pegawai::class);
    // }

    public function pegawais()
    {
        return $this->belongsToMany(Pegawai::class, 'tmt_pangkats', 'pangkat_id', 'pegawai_id');
    }

    // public function tmt_pangkats()
    // {
    //     return $this->hasMany(Tmt_Pangkat::class, 'pangkat_id', 'id');
    // }
}
