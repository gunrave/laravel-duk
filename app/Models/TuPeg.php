<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;
use App\Models\Tukin;

class TuPeg extends Model
{
    use HasFactory;

    protected $fillable = [
        'nominal',
        'pegawai_id',
        'tunkin_id',
    ];

    public function pegawais()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    public function tunkins()
    {
        return $this->belongsTo(Tukin::class, 'tunkin_id', 'id');
    }
}
