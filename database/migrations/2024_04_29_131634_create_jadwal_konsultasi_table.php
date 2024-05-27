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
        Schema::create('jadwal_konsultasi', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal_konsultasi");
            $table->time("waktu_konsultasi");
            $table->text("keterangan"); 
            $table->enum("status", ["diproses", "diterima", "ditolak"])->default("diproses");
            $table->foreignId("id_dokter")->constrained("dokter");
            $table->foreignId("id_profile")->constrained("profile");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_konsultasi');
    }
};
