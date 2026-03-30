<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $table = 'autok';

    protected $guarded = [];

    public function felhasznalo()
    {
        return $this->belongsTo(Felhasznalo::class, 'felhasznalo_id');
    }
}
