<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use App\Models\MovieCategory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Events\CustomMessageEvent;

class MoviesController extends Controller
{
    public function index()
    {
        $chart = Movie::query()
            ->select('movie_category_id', DB::raw('count(*) as total'))
            ->with('category')
            ->groupBy('movie_category_id')
            ->get();

        $movies = Movie::query()
            ->with('category')
            ->orderBy('title')
            ->paginate(20);

        event(new CustomMessageEvent("you are in index"));

        return view('pages.movies.index', compact('movies', 'chart'));
    }

    public function create()
    {
        $categories = MovieCategory::query()
            ->orderBy('name')
            ->get();

        return view('pages.movies.create', compact('categories'));
    }

    public function store(StoreMovieRequest $request)
    {
        if ($request->image) {
            $request->image->move(
                public_path('/uploads'),
                $request->image->getClientOriginalName()
            );
        }

        $movie =  Movie::create([
            'movie_category_id' => $request->movie_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'director' => $request->director,
            'rating' => $request->rating,
            'published_at' => $request->published_at,
            'image' => $request->image->getClientOriginalName(),
        ]);

        return Redirect::route('movies.show', $movie)
            ->with('success', 'Successfully created new movie.');
    }

    public function show(Movie $movie)
    {
        return view('pages.movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $categories = MovieCategory::query()
            ->orderBy('name')
            ->get();

        return view('pages.movies.edit', compact('movie', 'categories'));
    }

    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $movie->update($request->only(
            'movie_category_id',
            'title',
            'description',
            'director',
            'rating',
            'published_at',
        ));

        return Redirect::route('movies.show', $movie)
            ->with('success', 'Successfully updated movie details.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return Redirect::route('movies.index')
            ->with('success', 'Movie has been deleted.');
    }

    public function print()
    {
        $movies = Movie::query()
            ->with('category')
            ->orderBy('title')
            ->get();

        return view('pages.movies.print', compact('movies'));
    }

    public function generatePDF()
    {
        $movies = Movie::query()
            ->with('category')
            ->orderBy('title')
            ->get();

        $pdf = Pdf::loadView('pages.movies.print', compact('movies'));
        $pdf->set_paper('a4', 'landscape');
        $pdf->set_option('isRemoteEnabled', true);

        return $pdf->stream();
    }
}
