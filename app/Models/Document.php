<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_dokumen',
        'nama_dokumen_asli',
        'nomor_dokumen',
        'pemilik_dokumen_id',
        'tipe_dokumen_id',
    ];

    public function getFileLocation(){
        return 'public/documents/' . $this->nomor_dokumen . '/' . $this->nama_dokumen;
    }
}
