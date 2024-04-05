<?php

namespace App\Http\Controllers;

use App\Models\gapok_pegawai;
use App\Http\Requests\Storegapok_pegawaiRequest;
use App\Http\Requests\Updategapok_pegawaiRequest;
use App\Imports\GajiImport;
use App\Models\Gapok;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GapokPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd($gapok_pegawai);
        $gapegs = gapok_pegawai::paginate(10);
        // dd($gapegs);
        return view('gapegs.index', compact('gapegs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storegapok_pegawaiRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gapegs = gapok_pegawai::where('gapok_id', $id)->paginate(10);
        $gapok = Gapok::find($id);
        return view('gapegs.show', compact(['gapegs', 'id', 'gapok']));
    }

    public function gapokImport(Request $request)
    {
        // dd($request);
        request()->validate([
            'gapok_pegawais' => 'required|mimes:xlx,xls,xlsx|max:2048'
        ]);

        $file = $request->file('gapok_pegawais');

        $nama_file = rand().$file->getClientOriginalName();
        $gapok = $request->gapok;
        Excel::import(new GajiImport($gapok), $file);

        return back()->with('message', 'Gaji Imported Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($gapok_pegawai)
    {
        $gapegs = Gapok::find($gapok_pegawai);
        return view('gapegs.edit', compact(['gapegs']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updategapok_pegawaiRequest $request, gapok_pegawai $gapok_pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(gapok_pegawai $gapok_pegawai)
    {
        //
    }
}
