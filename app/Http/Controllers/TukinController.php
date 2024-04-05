<?php

namespace App\Http\Controllers;

use App\Models\Tukin;
use App\Http\Requests\StoreTukinRequest;
use App\Http\Requests\UpdateTukinRequest;

class TukinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tukins = Tukin::all()->sortDesc();

        // dd($gapoks);
        return view('tukins.index', compact('tukins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tukins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTukinRequest $request)
    {
        // dd($request);
        Tukin::create($request->validated());

        return redirect()->route('tukins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tukin $tukin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tukin $tukin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTukinRequest $request, Tukin $tukin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tukin $tukin)
    {
        $tukin->pegawais()->detach();
        $tukin->delete();

        return redirect()->route('tukins.index');
    }
}
