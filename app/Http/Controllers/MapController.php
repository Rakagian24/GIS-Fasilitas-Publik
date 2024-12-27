<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kecamatan;
use App\Models\TipeFasilitas;

class MapController extends Controller
{
    public function index()
    {
        // Ambil data fasilitas, kecamatan, dan tipe fasilitas
        $fasilitas = Fasilitas::with('kecamatan', 'tipeFasilitas')->get();
        $kecamatan = Kecamatan::all();
        $tipeFasilitas = TipeFasilitas::all();

        // Return data ke view
        return view('map.index', compact('fasilitas', 'kecamatan', 'tipeFasilitas'));
    }
}
