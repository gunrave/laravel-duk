<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pangkat;
use App\Models\Gapok;
use App\Models\Tukin;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'jabatan',
        'tmt_jabatan',
        'eselon',
        'bagian_wilayah'
    ];

    public function pangkats()
    {
        return $this->belongsToMany(Pangkat::class, 'tmt_pangkats', 'pegawai_id', 'pangkat_id')
                    ->withPivot('tmt_pangkat')
                    ->withTimestamps()
                    ->orderByPivot('created_at', 'desc')
                    ->limit(1);
    }

    public function gapoks()
    {
        return $this->belongsToMany(Gapok::class, 'gapok_pegawais', 'pegawai_id', 'gapok_id')
                    ->withPivot('nilai')
                    ->limit(1)
                    ->orderByPivot('created_at', 'desc')
                    ->withTimestamps();
    }

    public function tunkins()
    {
        return $this->belongsToMany(Tukin::class, 'tu_pegs', 'pegawai_id', 'tunkin_id')
                    ->withPivot('nominal')
                    ->limit(1)
                    ->orderByPivot('created_at', 'desc')
                    ->withTimestamps();
    }

    public function tagihans()
    {
        return $this->belongsToMany(Penagih::class, 'tagihans', 'pegawai_id', 'penagih_id')
                    ->withPivot('nominal')
                    ->withTimestamps();
    }
}
