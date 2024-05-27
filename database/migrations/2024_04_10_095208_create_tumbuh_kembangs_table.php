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
        Schema::disableForeignKeyConstraints();

        Schema::create('tumbuh_kembang', function (Blueprint $table) {
            $table->id();
            $table->integer('umur');
            $table->integer('tinggi');
            $table->integer('berat_badan');
            $table->integer('jumlah_gigi');
            $table->foreignId('id_hewan')->constrained('hewan');
            $table->string('gambar');
            $table->string('keterangan');
            $table->enum('status',['diterima','diproses','ditolak']);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tumbuh_kembangs');
    }
};
