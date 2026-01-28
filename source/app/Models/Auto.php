<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    public $table = 'autok';
    public $timestamps = false;
    public $guarded = [];

    /*
        $table->id();
        $table->string('marka');
        $table->string('tipus');
        $table->integer('evjarat');
        $table->string('rendszam') -> unique();
        $table->foreignId('tulaj') -> references('id') -> on('felhasznalok');
    */

    public function felhasznalo(){
        return $this -> belongsTo(Felhasznalo::class, 'felhasznalo');
    }
}
