<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    // GET /api/genres → Read all
    public function index()
    {
        $genres = Genre::all();

        return response()->json([
            'status' => 'success',
            'data' => $genres
        ]);
    }

    // POST /api/genres → Create new
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100'
        ]);

        $genre = Genre::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Genre created successfully',
            'data' => $genre
        ], 201);
    }
}
