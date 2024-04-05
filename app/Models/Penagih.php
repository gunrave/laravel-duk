<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penagih extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];

    public function pegawais()
    {
        return $this->belongsToMany(Pegawai::class, 'tagihans', 'pegawai_id', 'penagih_id');
    }
}
