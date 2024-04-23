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
        'tipe_dokumen',
        'nomor_dokumen',
        'pemilik_dokumen'
    ];
}
