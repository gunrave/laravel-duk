<?php

namespace App\Imports;

use App\Models\Gapok;
use App\Models\gapok_pegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class GajiImport implements ToCollection, SkipsEmptyRows
{
    // public function __construct($id)
    // {
    //     $this->gapok = $id;
    // }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $request = request()->all();
        // dd($request['gapok']);
        foreach ($rows as $row)
        {
            $pegawai = Pegawai::where('nik', $row[3])->first();
            $pegawai_id = $pegawai->id;
            // dd($pegawai_id);
            $gapoks = Gapok::where('bulan_tahun', $row[2].'-'.$row[1]. '-01')->first();
            // dd($row);
            gapok_pegawai::create([
                'pegawai_id' => $pegawai_id,
                'gapok_id' => $request['gapok'],
                'nilai' => $row[4],
            ]);
        }

    }


}
