<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('books.index', [
            'books' => Book::with('category')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        if (! Gate::allows('create-book') ) {
            abort(403);
        }
        return view('books.create', [
            'categories' => BookCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): View
    {
        return view('books.show', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): View
    {
        if (! Gate::allows('update-book', $book) ) {
            abort(403);
        }

        return view('books.edit', [
            'book' => $book,
            'categories' => BookCategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        if (! Gate::allows('update-book', $book) ) {
            abort(403);
        }

        if (storage_path('storage/cover/' . $book->cover)) {
            unlink(storage_path('app/public/cover/') . $book->cover);
        }

        $validated = $request->validated();

        $cover_name = Str::uuid() . '.' . $validated['cover']->getClientOriginalExtension();
        Image::make($validated['cover'])->resize(640, 360)->save(storage_path('app/public/cover/') . $cover_name);
        $validated['cover'] = $cover_name;

        $book->update($validated);
        return redirect(route('books.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        if (! Gate::allows('delete-book', $book) ) {
            abort(403);
        }

        unlink(storage_path('app/public/cover/') . $book->cover);
        $book->delete();
        return redirect(route('books.index'));
    }
}
