<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $document_types = [
            'Dokumen Perencanaan',
            'Dokumen Kebijakan/Pedoman',
            'Dokumen Proses',
            'Dokumen Bisnis Proses',
            'Dokumen Prosedur',
            'Dokumen Instruksi Kerja',
            'Dokumen SLA',
            'Dokumen OLA',
            'Dokumen NDA',
            'Dokumen BAST',
            'Dokumen Kontrak Magang/TLH',
            'Dokumen Direktorat',
            'Dokumen Bagian',
            'Dokumen Urusan',
            'Surat Keputusan',
            'Dokumen RTM',
            'Dokumen Rapat Koordinasi',
            'Dokumen Sasaran Mutu',
            'Dokumen Sasaran Layanan TI',
            'Dokumen Kontrak Manajerial (KM)',
            'Dokumen Aplikasi',
            'Surat Tugas',
            'Surat Balasan',
            'Surat Keterangan',
            'Dokumen Teknis',
            'Dokumen Kekayaan Intelektual',
            'Dokumen Lisensi',
            'Dokumen Awareness',
            'Dokumen Enterprise Architecture',
            'SDM',
        ];

        foreach($document_types as $document_type) {
            DocumentType::create(['name' => $document_type]);
        }
    }
}
