<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('autok', function (Blueprint $table) {
            $table->id();
            $table->string('marka');
            $table->string('tipus');
            $table->integer('evjarat');
            $table->string('rendszam')->unique();
            $table->string('szin')->nullable();
            $table->foreignId('felhasznalo_id')->constrained('felhasznalok')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autok');
    }
};
