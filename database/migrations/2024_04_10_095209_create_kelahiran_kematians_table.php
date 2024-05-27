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

        Schema::create('kelahiran_kematian', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis',['kelahiran','kematian']);
            $table->text('keterangan');
            $table->foreignId('id_hewan')->constrained('hewan');
            $table->string('gambar');
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
        Schema::dropIfExists('kelahiran_kematians');
    }
};
