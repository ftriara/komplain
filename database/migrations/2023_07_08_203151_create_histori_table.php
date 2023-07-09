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
        Schema::create('histori', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tindakan');
            $table->date('tanggal_tindakan');
            $table->date('tanggal_selesai');
            $table->unsignedBigInteger('id_komplain');
            $table->foreign('id_komplain')->references('id')->on('komplain');
            $table->unsignedBigInteger('id_petugas');
            $table->foreign('id_petugas')->references('id')->on('petugas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori');
    }
};
