<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    // GET /api/genres → Read all
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Genre::all()
        ]);
    }

    // POST /api/genres → Create
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

    // GET /api/genres/{id} → Show one
    public function show($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Genre not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $genre
        ]);
    }

    // PUT /api/genres/{id} → Update
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Genre not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100'
        ]);

        $genre->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Genre updated successfully',
            'data' => $genre
        ]);
    }

    // DELETE /api/genres/{id} → Destroy
    public function destroy($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Genre not found'
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Genre deleted successfully'
        ]);
    }
}
