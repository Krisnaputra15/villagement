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
        Schema::create('forum_media', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->char('forum_id', 36);
            $table->string('nama_file', 200);
            $table->timestamps();
            $table->foreign('forum_id')->references('id')->on('forum')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_media');
    }
};
