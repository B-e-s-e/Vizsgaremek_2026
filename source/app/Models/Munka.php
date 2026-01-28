<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Munka extends Model
{
    use HasFactory;
    public $table = 'munkak';
    public $timestamps = false;
    public $guarded = [];

    public function auto()
    {
        return $this->belongsTo(Auto::class, 'auto');
    }

    public function felhasznalo()
    {
        return $this->belongsTo(Felhasznalo::class, 'felhasznalo');
    }

    public function takarito()
    {
        return $this->belongsTo(Takarito::class, 'takarito');
    }
}
