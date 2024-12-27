<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeFasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $tipeFasilitas = [
            'Bank',
            'Stasiun',
            'Kantor Kecamatan',
            'Puskesmas',
            'Posyandu'
        ];

        foreach ($tipeFasilitas as $name) {
            DB::table('tipe_fasilitas')->insert([
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
