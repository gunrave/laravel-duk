<?php

namespace App\Http\Controllers;

use App\Models\Gapok;
use App\Http\Requests\StoreGapokRequest;
use App\Http\Requests\UpdateGapokRequest;

class GapokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gapoks = Gapok::all()->sortDesc();

        // dd($gapoks);
        return view('gapoks.index', compact('gapoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gapoks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGapokRequest $request)
    {
        // dd($request);
        Gapok::create($request->validated());

        return redirect()->route('gapoks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gapok $gapok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gapok $gapok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGapokRequest $request, Gapok $gapok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gapok $gapok)
    {
        $gapok->pegawais()->detach();
        $gapok->delete();

        return redirect()->route('gapoks.index');
    }
}
