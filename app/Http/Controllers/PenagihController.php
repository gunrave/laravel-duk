<?php

namespace App\Http\Controllers;

use App\Models\Penagih;
use App\Http\Requests\StorePenagihRequest;
use App\Http\Requests\UpdatePenagihRequest;

class PenagihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penagihs = Penagih::all();

        return view('penagihs.index', compact('penagihs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penagihs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenagihRequest $request)
    {
        Penagih::create($request->validated());

        return redirect()->route('penagihs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penagih $penagih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penagih $penagih)
    {
        return view('penagihs.edit', compact('penagih'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenagihRequest $request, Penagih $penagih)
    {
        $penagih->update($request->validated());

        return redirect()->route('penagihs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penagih $penagih)
    {
        $penagih->delete();

        return redirect()->route('penagihs.index');
    }
}
