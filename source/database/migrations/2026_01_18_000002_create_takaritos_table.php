<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('takaritok', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->string('phonenumber') ->unique();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('takaritok');
    }
};
