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
        Schema::create('users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('username')->nullable();
            $table->string('nik',16)->unique();
            $table->string('password',1000)->nullable();
            $table->string('nama')->nullable();
            $table->string('dusun')->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->enum('level', [1,2])->default(2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
