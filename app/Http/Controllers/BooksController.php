<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\View\View;

class BooksController extends Controller
{
    public function index()
    {   
        $books = Book::query()
            ->orderBy('title')
            ->paginate(20);

        return view('pages.books.index', compact('books'));
    }

    public function create(): View
    {
        return view('pages.books.create');
    }

    public function show(Book $book): View
    {
        return view('pages.books.show', compact('book'));
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        $book = Book::create($request->only(
            'title',
            'description',
            'country_id',
            'stocks',
            'amount',
            'photo',
        ));

        return Redirect::route('books.show', $book)
            ->with('success', 'Successfully created new book.');
    }

    public function edit(Book $book): View
    {
        return view('pages.books.edit', compact('book'));
    }

    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->only(
            'title',
            'description',
            'country_id',
            'stocks',
            'amount',
            'photo',
        ));

        return Redirect::route('books.show', $book)
            ->with('success', 'Successfully updated book details.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return Redirect::route('books.index')
            ->with('success', 'Book has been deleted.');
    }
}
