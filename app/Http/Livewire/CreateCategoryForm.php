<?php

namespace App\Http\Livewire;

use App\Models\BookCategory;
use Livewire\Component;

class CreateCategoryForm extends Component
{
    public string $title;
    public string $slug;

    protected $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:64'
    ];

    public function store()
    {
        $this->validate();
        BookCategory::create([
            'title' => $this->title,
            'slug' => $this->slug,
        ]);
        return redirect()->route('books.categories.index');
    }

    public function render()
    {
        return view('livewire.create-category-form');
    }
}
