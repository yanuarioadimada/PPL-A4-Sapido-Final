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

        Schema::create('penyakit', function (Blueprint $table) {
            $table->id();
            $table->string('gejala');
            $table->text('keterangan');
            $table->foreignId('id_hewan')->constrained('hewan');
            $table->enum('status',['diterima','diproses','ditolak']);
            $table->string('gambar');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyakits');
    }
};
