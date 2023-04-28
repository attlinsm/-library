<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCategoryRequest;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('books.categories.index', [
            'categories' => BookCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        if (! Gate::allows('create-category') ) {
            abort(403);
        }

        return view('books.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookCategoryRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(BookCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCategory $category): View
    {
        if (! Gate::allows('update-category', $category) ) {
            abort(403);
        }

        return view('books.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookCategoryRequest $request, BookCategory $category)
    {
        if (! Gate::allows('update-category' , $category) ) {
            abort(403);
        }

        $validated = $request->validated();
        $category->update($validated);
        return redirect(route('books.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCategory $category)
    {
        if (! Gate::allows('delete-category', $category) ) {
            abort(403);
        }

        $category->delete();
        return redirect(route('books.categories.index'));
    }
}
