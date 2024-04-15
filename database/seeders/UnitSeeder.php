<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            'Direktorat Pusat Teknologi Informasi',
            'Bagian Riset dan Layanan TI',
            'Urusan Manajemen Mutu',
            'Urusan Pengelolaan Konten dan Sumber Daya TI',
            'Urusan Pengguna Layanan',
            'Urusan Riset TI',
            'Bagian Infrastruktur TI',
            'Urusan Infrastruktur Jaringan TI'
        ];

        $unit = Unit::create([
            'name' => 'Direktorat Pusat Teknologi Informasi',
            'parent_id' => null
        ]);

        $unit2 = Unit::create([
            'name' => 'Bagian Riset dan Layanan TI',
            'parent_id' => $unit->id
        ]);

        $unit3 = Unit::create([
            'name' => 'Urusan Manajemen Mutu',
            'parent_id' => $unit2->id
        ]);

        $unit3 = Unit::create([
            'name' => 'Urusan Pengelolaan Konten dan Sumber Daya TI',
            'parent_id' => $unit2->id
        ]);

        $unit3 = Unit::create([
            'name' => 'Urusan Pengguna Layanan',
            'parent_id' => $unit2->id
        ]);

        $unit3 = Unit::create([
            'name' => 'Urusan Riset TI',
            'parent_id' => $unit2->id
        ]);

        $unit2 = Unit::create([
            'name' => 'Bagian Infrastruktur TI',
            'parent_id' => $unit->id
        ]);

        $unit3 = Unit::create([
            'name' => 'Urusan Infrastruktur Jaringan TI',
            'parent_id' => $unit2->id
        ]);

    }
}
