<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Szolgaltatas extends Model
{
    use HasFactory;
    public $table = 'szolgaltatasok';
    public $timestamps = false;
    public $guarded = [];

    public function munka(){
        return $this -> belongsTo(Munka::class, 'munka');
    }
}
