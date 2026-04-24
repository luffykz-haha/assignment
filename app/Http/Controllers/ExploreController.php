<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\Court;

class ExploreController extends Controller
{
    public function index(Request $request)
    {
        $sports = Sport::orderBy('name')->get();
        $search = trim((string) $request->query('search', ''));
        $matchingCourts = collect();

        if ($search !== '') {
            $matchingCourts = Court::with('sport')
                ->where('location', 'like', '%' . $search . '%')
                ->orWhereHas('sport', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orderBy('name')
                ->get();
        }

        return view('explore.index', compact('sports', 'search', 'matchingCourts'));
    }

    public function bySport($id)
    {
        $sport = Sport::findOrFail($id);
        $courts = Court::where('sport_id', $id)->get();

        return view('explore.sport-results', compact('sport', 'courts'));
    }
}
