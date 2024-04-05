<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use App\Http\Requests\StorePangkatRequest;
use App\Http\Requests\UpdatePangkatRequest;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pangkats = Pangkat::all();

        return view('pangkats.index', compact('pangkats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pangkats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePangkatRequest $request)
    {
        Pangkat::create($request->validated());

        return redirect()->route('pangkats.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pangkat $pangkat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pangkat $pangkat)
    {
        return view('pangkats.edit', compact('pangkat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePangkatRequest $request, Pangkat $pangkat)
    {
        $pangkat->update($request->validated());

        return redirect()->route('pangkats.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pangkat $pangkat)
    {
        $pangkat->delete();

        return redirect()->route('pangkats.index');
    }
}
