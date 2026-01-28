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
        Schema::create('szolgaltatasok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('munka') -> references('id') -> on('munkak')->onDelete('cascade');
            $table->integer('ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('szolgaltatasok');
    }
};
