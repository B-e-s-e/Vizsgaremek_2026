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
        Schema::create('munkak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auto') -> references('id') -> on('autok')->onDelete('cascade');
            $table->foreignId('felhasznalo') -> references('id') -> on('felhasznalok')->onDelete('cascade');
            $table->foreignId('takarito') -> references('id') -> on('takaritok')->onDelete('cascade');
            $table->string('datum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('munkak');
    }
};
