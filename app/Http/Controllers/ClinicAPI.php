<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Pet;
use Illuminate\Http\Request;

class clinicAPI extends Controller
{
    public function index()
    {
        $x = Client::get();
        $y = Pet::first();
        return $x;
    }
}
