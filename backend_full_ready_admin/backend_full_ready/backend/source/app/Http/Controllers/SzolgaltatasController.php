<?php

namespace App\Http\Controllers;

use App\Models\Szolgaltatas;

class SzolgaltatasController extends Controller
{
    public function index()
    {
        return Szolgaltatas::orderBy('ar')->get();
    }
}
