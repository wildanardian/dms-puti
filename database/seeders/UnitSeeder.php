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

        foreach ($units as $unit) {
            Unit::create([
                'name' => $unit
            ]);
        }
    }
}
