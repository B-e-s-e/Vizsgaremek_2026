<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('munkak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auto_id')->constrained('autok')->cascadeOnDelete();
            $table->foreignId('felhasznalo_id')->constrained('felhasznalok')->cascadeOnDelete();
             $table->unsignedBigInteger('szolgaltatas_id')->nullable();
            $table->date('datum');
            $table->string('helyszin');
            $table->text('megjegyzes')->nullable();
            $table->integer('ar');
            $table->string('allapot')->default('Új');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('munkak');
    }
};
