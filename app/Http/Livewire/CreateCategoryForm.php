<?php

namespace App\Http\Livewire;

use App\Http\Requests\BookCategoryRequest;
use App\Models\BookCategory;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class CreateCategoryForm extends Component
{
    public string $title;
    public string $slug;

    public function createCategory(BookCategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $category = new BookCategory();
        $category->fill($validated)->save();
        return redirect(route('books.categories.index'));
    }

    public function render()
    {
        return view('livewire.create-category-form');
    }
}
