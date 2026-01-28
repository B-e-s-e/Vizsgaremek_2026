<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Takarito extends Model
{
    use HasFactory;
    public $table = 'takaritok';
    public $timestamps = false;
    public $guarded = [];
}
