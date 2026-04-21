<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\Court;

class ExploreController extends Controller
{
    public function index(Request $request)
    {
        $sports = Sport::all();

        return view('explore.index', compact('sports'));
    }

    public function bySport($id)
    {
        $sport = Sport::findOrFail($id);
        $courts = Court::where('sport_id', $id)->get();

        return view('explore.sport-results', compact('sport', 'courts'));
    }
}
