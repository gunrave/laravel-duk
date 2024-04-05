<?php

namespace App\Imports;

use App\Models\Pangkat;
use App\Models\Pegawai;
// use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaisImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Pegawai::create([
                'nik' => $row[2],
                'nama' => $row[3],
                'jabatan' => $row[7],
                'tmt_jabatan' => $row[8],
                'eselon' => $row[9],
                'bagian_wilayah' => $row[10],
            ]);

            $pegawai = Pegawai::where('nik', $row[2])->first();
            $pangkat = Pangkat::where('golongan', $row[5])->first();
            // dd($pangkat);
            $pegawai->pangkats()->attach($pangkat, ['tmt_pangkat' => $row[6]]);
        }
    }
}
