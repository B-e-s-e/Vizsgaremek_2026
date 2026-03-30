<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Felhasznalo extends Model
{
    use HasFactory;

    protected $table = 'felhasznalok';

    protected $guarded = [];

    protected $hidden = ['password', 'api_token'];

    public function autok()
    {
        return $this->hasMany(Auto::class, 'felhasznalo_id');
    }

    public function munkak()
    {
        return $this->hasMany(Munka::class, 'felhasznalo_id');
    }
}
