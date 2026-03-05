<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('felhasznalok', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->string('phonenumber') -> unique();
            $table->string('email') -> unique();
            $table -> string('jelszo');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('felhasznalok');
    }
};
