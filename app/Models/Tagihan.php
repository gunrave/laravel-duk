<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'penagih_id',

    ];

    public function pegawais()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    public function penagihs()
    {
        return $this->belongsTo(Penagih::class, 'penagih_id', 'id');
    }
}
