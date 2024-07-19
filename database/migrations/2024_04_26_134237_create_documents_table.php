<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokumen');
            $table->string('nama_dokumen_asli');
            $table->string('nomor_dokumen');
            $table->unsignedBigInteger('pemilik_dokumen_id')->nullable();
            $table->unsignedBigInteger('tipe_dokumen_id')->nullable();
            $table->foreign('tipe_dokumen_id')->references('id')->on('document_types');
            $table->foreign('pemilik_dokumen_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document');
    }
};
