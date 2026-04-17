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
        $query = Court::query();

        if($request->filled('search')){
            $query->where('name', 'like','%' . $request->search . '%')
                  ->orWhere('location', 'like', '%' . $request->search . '%');
        }

        $courts = $query->get();

        return view('explore.index', compact('courts', 'sports'));
    }
}
