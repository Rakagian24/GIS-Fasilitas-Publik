<?php

use App\Models\Fasilitas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\TipeFasilitasController;

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    // Total counts
    $totalBank = Fasilitas::where('tipe_id', 1)->count();
    $totalStasiun = Fasilitas::where('tipe_id', 2)->count();
    $totalKantorKecamatan = Fasilitas::where('tipe_id', 3)->count();
    $totalPuskesmas = Fasilitas::where('tipe_id', 4)->count();
    $totalPosyandu = Fasilitas::where('tipe_id', 5)->count();
    $totalFasilitas = Fasilitas::count();
    $totalKecamatan = DB::table('kecamatan')->count();
    $totalTipeFasilitas = DB::table('tipe_fasilitas')->count();

    // Fasilitas per Kecamatan
    $facilitiesByKecamatan = DB::table('fasilitas')
        ->join('kecamatan', 'fasilitas.kecamatan_id', '=', 'kecamatan.id')
        ->select('kecamatan.name as kecamatan', DB::raw('COUNT(*) as count'))
        ->groupBy('kecamatan.name')
        ->get();
    $kecamatanLabels = $facilitiesByKecamatan->pluck('kecamatan');
    $kecamatanData = $facilitiesByKecamatan->pluck('count');

    // Fasilitas per Tipe
    $facilitiesByType = DB::table('fasilitas')
        ->join('tipe_fasilitas', 'fasilitas.tipe_id', '=', 'tipe_fasilitas.id')
        ->select('tipe_fasilitas.name as tipe', DB::raw('COUNT(*) as count'))
        ->groupBy('tipe_fasilitas.name')
        ->get();
    $typeLabels = $facilitiesByType->pluck('tipe');
    $typeData = $facilitiesByType->pluck('count');

    return view('welcome', compact(
        'totalKantorKecamatan',
        'totalStasiun',
        'totalBank',
        'totalPuskesmas',
        'totalPosyandu',
        'totalFasilitas',
        'totalKecamatan',
        'totalTipeFasilitas',
        'kecamatanLabels',
        'kecamatanData',
        'typeLabels',
        'typeData'
    ));
});


Route::get('/api/fasilitas', function () {
    return response()->json(Fasilitas::with(['kecamatan', 'tipeFasilitas'])->get());
});


Route::get('/map', [MapController::class, 'index'])->name('map.index');

Route::resource('fasilitas', FasilitasController::class)
    ->parameters(['fasilitas' => 'fasilitas']); // Mengubah 'fasilita' menjadi 'fasilitas'

Route::resource('kecamatan', KecamatanController::class);
Route::resource('tipe-fasilitas', TipeFasilitasController::class)
    ->parameters(['tipe-fasilitas' => 'tipe-fasilitas']);
