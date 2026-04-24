<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;

class WelcomeController extends Controller
{
    public function index()
    {
        $featuredCourts = Court::with('sport')->inRandomOrder()->limit(6)->get();
        return view('welcome', compact('featuredCourts'));
    }
}
