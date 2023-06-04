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
        Schema::create('data_desa', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nama_desa');
            $table->string('alamat_desa');
            $table->string('nama_kepala_desa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_desa');
    }
};
