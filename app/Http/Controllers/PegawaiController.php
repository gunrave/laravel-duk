<?php

namespace App\Http\Controllers;

use App\DataTables\PegawaisDataTable;
use App\Models\Pegawai;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use App\Imports\PegawaisImport;
use App\Models\Pangkat;
use App\Models\Tmt_Pangkat;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PegawaisDataTable $dataTable)
    {
        // $pegawais = Pegawai::with('pangkats')->get();
        // $pegawais = Pegawai::has('pangkats')->get();
        $pegawais = Pegawai::paginate();
        // $pegawai_gapok = $pegawais->gapoks()->orderBy('created_by')->first();
        // $nominal_gapok = $pegawai_gapok->pivot;
        // dd($pegawais);
       // $pangkats = $pegawais->pangkats->get();
        return view('pegawais.index', compact('pegawais'));
        // return $dataTable->render('pegawais.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pangkats = Pangkat::all();
        return view('pegawais.create', compact('pangkats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePegawaiRequest $request)
    {
        // dd($request);

        Pegawai::create($request->validated());

        $pegawai = Pegawai::where('nik', $request->nik)->first();
        $pangkat = Pangkat::find($request->pangkat_id);
        $pegawai->pangkats()->attach($pangkat, ['tmt_pangkat' => $request->tmt_pangkat]);

       return redirect()->route('pegawais.index');
    }

    public function fileImport(Request $request)
    {

        // dd($request);
        request()->validate([
            'pegawais' => 'required|mimes:xlx,xls,xlsx|max:2048'
        ]);

        $file = $request->file('pegawais');

        $nama_file = rand().$file->getClientOriginalName();

        Excel::import(new PegawaisImport, $file);

        return back()->with('message', 'User Imported Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
         $pangkats = Pangkat::all();
         $pegawai = Pegawai::findOrFail($pegawai->id);
         $pangkat_pegawai = $pegawai->pangkats()->orderBy('tmt_pangkat')->first();
         $tmt_pangkat = $pangkat_pegawai->pivot;

        // dd($tmt_pangkat->tmt_pangkat);
        // // $tmt_pangkats = Tmt_Pangkat::findOrFail($pegawai);
        // $tmt_pangkats = Tmt_Pangkat::findOr($pegawai, function(){
        //     return false;
        // });
        // dd($pegawai->tmt_pangkats());

        return view('pegawais.edit', compact('pegawai', 'pangkats', 'pangkat_pegawai', 'tmt_pangkat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        $pegawai->update($request->validated());
        $pangkat = $request->pangkat_id;
        $pegawai->pangkats()->attach($pangkat, ['tmt_pangkat' => $request->tmt_pangkat]);
        //dd($pangkat);

        return redirect()->route('pegawais.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->pangkats()->detach();
        $pegawai->delete();

        return redirect()->route('pegawais.index');
    }
}
