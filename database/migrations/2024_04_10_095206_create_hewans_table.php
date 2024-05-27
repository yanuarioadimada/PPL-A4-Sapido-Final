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

        Schema::create('hewan', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_kelamin', ["jantan","betina"]);
            $table->text('keterangan');
            $table->enum('jenis_hewan',["sapi","kambing"]);
            $table->string('nomor_hewan');
            $table->string('gambar')->nullable();
            $table->foreignId('id_induk')->nullable()->constrained('hewan');
            $table->foreignId('id_profile')->constrained('profile');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hewans');
    }
};
