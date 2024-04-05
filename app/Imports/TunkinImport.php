<?php

namespace App\Imports;

use App\Models\Pegawai;
use App\Models\TuPeg;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TunkinImport implements ToCollection, SkipsEmptyRows, WithHeadingRow //ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new TuPeg([
    //         //
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        $request = request()->all();

        // dd($rows);
        foreach ($rows as $row) {
            // dd($request['tupeg']);
            // dd($row);
            $pegawai = Pegawai::where('nik', $row['nip'])->first();
            if(isset($pegawai->id)){
                $pegawai_id = $pegawai->id;
                // dd($pegawai);
                TuPeg::create([
                    'pegawai_id' => $pegawai_id,
                    'tunkin_id' => $request['tupeg'],
                    'nominal' => $row['netto'],
                ]);
            }

        }
    }
}
