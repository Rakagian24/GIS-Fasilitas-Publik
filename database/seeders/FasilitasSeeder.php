<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class FasilitasSeeder extends Seeder
{
    public function run(): void
    {
        // Path ke file CSV
        $filePath = database_path('seeders/stasiun_kota_bandung.csv'); // Letakkan file di direktori seeders
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0); // Baris pertama sebagai header

        $records = $csv->getRecords(); // Dapatkan semua data dari CSV

        foreach ($records as $record) {
            $kecamatanId = DB::table('kecamatan')->where('name', $record['kecamatan'])->value('id');
            $tipeId = DB::table('tipe_fasilitas')->where('name', $record['tipe_fasilitas'])->value('id');

            DB::table('fasilitas')->insert([
                'name' => $record['name'],
                'alamat' => $record['alamat'],
                'kecamatan_id' => $kecamatanId,
                'tipe_id' => $tipeId,
                'no_telp' => $record['no_telp'],
                'latitude' => $record['latitude'],
                'longitude' => $record['longitude'],
                // 'gambar' => $record['gambar'], // Jika ada kolom gambar
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
