<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Szolgaltatas extends Model
{
    use HasFactory;

    protected $table = 'szolgaltatasok';

    protected $guarded = [];

    public function munkak()
    {
        return $this->hasMany(Munka::class, 'szolgaltatas_id');
    }
}
