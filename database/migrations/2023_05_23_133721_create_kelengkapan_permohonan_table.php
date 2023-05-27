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
        Schema::create('kelengkapan_permohonan', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->char('permohonan_id', 36);
            $table->string('nama_file');
            $table->foreign('permohonan_id')->references('id')->on('permohonan')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelengkapan_permohonan');
    }
};
