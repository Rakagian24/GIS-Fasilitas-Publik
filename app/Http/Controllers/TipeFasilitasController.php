<?php

namespace App\Http\Controllers;

use App\Models\TipeFasilitas;
use Illuminate\Http\Request;

class TipeFasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipeFasilitas = TipeFasilitas::all();
        return view('tipe-fasilitas.index', compact('tipeFasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipe-fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tipe_fasilitas,name|max:255',
        ]);

        TipeFasilitas::create($request->all());
        return redirect()->route('tipe-fasilitas.index')->with('success', 'Tipe Fasilitas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipeFasilitas $tipeFasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipeFasilitas $tipeFasilitas)
    {
        return view('tipe-fasilitas.edit', compact('tipeFasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipeFasilitas $tipeFasilitas)
    {
        $request->validate([
            'name' => 'required|unique:tipe_fasilitas,name,' . $tipeFasilitas->id . '|max:255',
        ]);

        $tipeFasilitas->update($request->all());
        return redirect()->route('tipe-fasilitas.index')->with('success', 'Tipe Fasilitas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipeFasilitas $tipeFasilitas)
    {
        $tipeFasilitas->delete();
        return redirect()->route('tipe-fasilitas.index')->with('success', 'Tipe Fasilitas berhasil dihapus!');
    }
}
