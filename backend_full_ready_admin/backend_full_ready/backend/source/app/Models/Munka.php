<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Munka extends Model
{
    use HasFactory;

    protected $table = 'munkak';

    protected $guarded = [];

    public function auto()
    {
        return $this->belongsTo(Auto::class, 'auto_id');
    }

    public function felhasznalo()
    {
        return $this->belongsTo(Felhasznalo::class, 'felhasznalo_id');
    }

    public function szolgaltatas()
    {
        return $this->belongsTo(Szolgaltatas::class, 'szolgaltatas_id');
    }
}
