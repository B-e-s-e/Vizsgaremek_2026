<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('szolgaltatasok', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->text('leiras');
            $table->integer('ar');
            $table->string('idotartam')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('szolgaltatasok');
    }
};
