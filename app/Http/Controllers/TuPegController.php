<?php

namespace App\Http\Controllers;

use App\Models\TuPeg;
use App\Http\Requests\StoreTuPegRequest;
use App\Http\Requests\UpdateTuPegRequest;
use App\Imports\TunkinImport;
use App\Models\Tukin;
use Illuminate\Http\Request;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;

class TuPegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tupegs = TuPeg::paginate(10);
        return view('tupeg.index', compact('tupegs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTuPegRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // dd($tuPeg);
        $tupegs = TuPeg::where('tunkin_id', $id)->paginate(10);
        $tunkin = Tukin::find($id);
        return view('tupeg.show', compact(['tupegs', 'tunkin']));
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function tupegImport(Request $request)
    {
        // dd($request);

        request()->validate([
            'tunker_pegawais' => 'required|mimes:xlx,xls,xlsx|max:2048'
        ]);

        $file = $request->file('tunker_pegawais');

        $nama_file = rand().$file->getClientOriginalName();
        $tunkin = $request->tunkin;
        Excel::import(new TunkinImport($tunkin), $file);

        return back()->with('message', 'Tunkin Imported Successfully');
    }

    public function edit(TuPeg $tuPeg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTuPegRequest $request, TuPeg $tuPeg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TuPeg $tuPeg)
    {
        //
    }
}
