<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        $kecamatan = [
            'Andir',
            'Antapani',
            'Arcamanik',
            'Astanaanyar',
            'Babakan Ciparay',
            'Bandung Kidul',
            'Bandung Kulon',
            'Bandung Wetan',
            'Batununggal',
            'Bojongloa Kaler',
            'Bojongloa Kidul',
            'Buahbatu',
            'Cibeunying Kaler',
            'Cibeunying Kidul',
            'Cibiru',
            'Cicendo',
            'Cidadap',
            'Cinambo',
            'Coblong',
            'Gedebage',
            'Kiaracondong',
            'Lengkong',
            'Mandalajati',
            'Panyileukan',
            'Rancasari',
            'Regol',
            'Sukajadi',
            'Sukasari',
            'Sumur Bandung',
            'Ujung Berung'
        ];

        foreach ($kecamatan as $name) {
            DB::table('kecamatan')->insert(['name' => $name, 'created_at' => now(), 'updated_at' => now()]);
        }
    }
}
