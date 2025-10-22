<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    // GET /api/authors → Read all
    public function index()
    {
        $authors = Author::all();
        return response()->json([
            'status' => 'success',
            'data' => $authors
        ]);
    }

    // POST /api/authors → Create new
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'nationality' => 'nullable|string|max:100'
        ]);

        $author = Author::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Author created successfully',
            'data' => $author
        ], 201);
    }
}
