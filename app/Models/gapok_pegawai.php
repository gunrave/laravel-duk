<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gapok;
use App\Models\Pegawai;

class gapok_pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'gapok_id',
        'nilai'
    ];

    public function pegawais()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    public function gapoks()
    {
        return $this->belongsTo(Gapok::class, 'gapok_id', 'id');

    }
}
