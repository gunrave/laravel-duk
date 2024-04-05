<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmt_Pangkat extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'pangkat_id',
        'tmt_pangkat'
    ];

    public function pegawais(){
        return $this->belongsTo(Pegawai::class, 'id', 'pegawai_id');
    }

    public function pangkats(){
        return $this->belongsTo(Pangkat::class, 'id', 'pangkat_id');
    }
}
