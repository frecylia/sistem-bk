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
        Schema::create('skor_hasils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hasil_tes_id');
            $table->foreignId('kategori_id');
            $table->integer('total_skor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skor_hasils');
    }
};
