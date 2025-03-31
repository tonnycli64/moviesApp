<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Movies ordered by release date (newest first)
        $recentMovies = Movie::orderBy('release_date', 'desc')
        ->take(10)
        ->get();

        // Movies ordered by most purchases (using relationship)
        $popularMovies = Movie::withCount('purchases') // Assuming the relationship is named "orders"
            ->orderBy('purchases_count', 'desc')
            ->take(10)
            ->get();

        return view('landing', [
            'recentMovies' => $recentMovies,
            'popularMovies' => $popularMovies
        ]);
    }
}