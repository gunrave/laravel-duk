<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gapok extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan_tahun',
        'terbayar',
    ];

    public function pegawais()
    {
        return $this->belongsToMany(Pegawai::class, 'gapok_pegawais', 'pegawai_id', 'gapok_id');
    }
}
