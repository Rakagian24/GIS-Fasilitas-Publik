<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\TipeFasilitas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = Fasilitas::with(['kecamatan', 'tipeFasilitas'])->get();
        return view('fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        $tipeFasilitas = TipeFasilitas::all();
        return view('fasilitas.create', compact('kecamatan', 'tipeFasilitas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'kecamatan_id' => 'required',
            'tipe_id' => 'required',
            'no_telp' => 'nullable',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $fasilitas = new Fasilitas($request->all());

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('fasilitas', 'public');
            $fasilitas->gambar = $path;
        }

        $fasilitas->save();

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fasilitas $fasilitas)
    {
        return view('fasilitas.show', compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasilitas $fasilitas)
    {
        $kecamatan = Kecamatan::all();
        $tipeFasilitas = TipeFasilitas::all();
        return view('fasilitas.edit', compact('fasilitas', 'kecamatan', 'tipeFasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'kecamatan_id' => 'required',
            'tipe_id' => 'required',
            'no_telp' => 'nullable',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $fasilitas->fill($request->all());

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('fasilitas', 'public');
            $fasilitas->gambar = $path;
        }

        $fasilitas->save();

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasilitas $fasilitas)
    {
        // if ($fasilitas->gambar) {
        //     \Storage::delete('public/' . $fasilitas->gambar);
        // }

        $fasilitas->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}
