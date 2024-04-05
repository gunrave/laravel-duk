<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;

class Tukin extends Model
{
    use HasFactory;

    protected $fillable = [
        'periode',
    ];

    // public function setPeriodeAttribute($value)
    // {
    //     $this->attribute['periode'] = $value.':00';
    // }

    public function pegawais()
    {
        return $this->belongsToMany(Pegawai::class, 'tu_pegs', 'pegawai_id', 'tunkin_id');
    }
}
