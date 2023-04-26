<?php

namespace App\Http\Livewire;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBookForm extends Component
{
    use WithFileUploads;

    public string $title;
    public string $slug;
    public string $author;
    public string $description;
    public Collection $categories;
    public int $category_id;
    public float $rating;
    public $cover;

    protected $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:64',
        'author' => 'required|string|max:64',
        'description' => 'required|string|max:255',
        'category_id' => 'required|integer',
        'rating' => 'nullable|numeric',
        'cover' => 'required|image',
    ];

    public function store()
    {
        $validated = $this->validate();

        $cover_name = Str::uuid();
        Image::make($validated['cover'])->resize(640, 360);
        $this->cover->storeAs('/public/cover', $cover_name);
        $validated['cover'] = $cover_name;

        $book = new Book();
        $book->fill($validated)->save();

        return redirect(route('books.index'));
    }

    public function render()
    {
        return view('livewire.create-book-form');
    }
}
