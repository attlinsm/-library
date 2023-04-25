<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CreateBookForm extends Component
{
    public string $title;
    public string $slug;
    public string $author;
    public string $description;
    public Collection $categories;
    public string $category;
    public float $rating;
    public string $cover;

    public function store()
    {

    }

    public function render()
    {
        return view('livewire.create-book-form');
    }
}
