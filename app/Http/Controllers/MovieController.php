<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movie.index', compact('movies'));
    }

    public function create()
    {
        return view('movie.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'string',
            'genre' => 'string',
            'director' => 'string',
            'release' => 'integer',
            'rating' => 'integer',
            'your_rating' => 'integer'
        ]);
        Movie::create($data);
        return redirect()->route('movie.index');
    }

    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('movie.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'title' => 'string',
            'genre' => 'string',
            'director' => 'string',
            'release' => 'integer',
            'rating' => 'integer',
            'your_rating' => 'integer'
        ]);
        $movie->update($data);
        return redirect()->route('movie.show', $movie->id);
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movie.index');
    }
}
