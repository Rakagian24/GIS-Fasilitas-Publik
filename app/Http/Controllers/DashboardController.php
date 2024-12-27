<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Counts
        $totalKantorKecamatan = Fasilitas::where('tipe_id', 1)->count(); // Misalnya tipe_id = 1 untuk Kantor Kecamatan
        $totalStasiun = Fasilitas::where('tipe_id', 2)->count(); // Misalnya tipe_id = 2 untuk Stasiun
        $totalBank = Fasilitas::where('tipe_id', 3)->count();
        $totalPuskesmas = Fasilitas::where('tipe_id', 4)->count();
        $totalPosyandu = Fasilitas::where('tipe_id', 5)->count();
        $totalFasilitas = Fasilitas::count();
        $totalKecamatan = Kecamatan::count();
        $totalTipeFasilitas = DB::table('tipe_fasilitas')->count();

        // Fasilitas per Kecamatan
        $fasilitasPerKecamatan = Fasilitas::select('kecamatan_id', DB::raw('count(*) as total'))
            ->groupBy('kecamatan_id')
            ->get();

        $kecamatanLabels = Kecamatan::whereIn('id', $fasilitasPerKecamatan->pluck('kecamatan_id'))
            ->pluck('name'); // Ganti 'nama' dengan field nama kecamatan Anda
        $kecamatanData = $fasilitasPerKecamatan->pluck('total');

        return view('dashboard', compact(
            'totalKantorKecamatan',
            'totalStasiun',
            'totalBank',
            'totalPuskesmas',
            'totalPosyandu',
            'totalFasilitas',
            'totalKecamatan',
            'totalTipeFasilitas',
            'kecamatanLabels',
            'kecamatanData'
        ));
    }
}
