<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{

    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cover_name = Str::uuid() . '.jpg';
        $cover_path = 'public/cover/' . $cover_name;

        $image = Image::canvas(640, 360, '#007bff')->encode('jpg', 75);
        Storage::put($cover_path, (string) $image);

        $categoryIds = BookCategory::pluck('id')->toArray();

        return [
            'title' => $this->faker->words(2, true),
            'slug' => $this->faker->slug(2),
            'author' => $this->faker->name(),
            'category_id' => $this->faker->randomElement($categoryIds),
            'description' => $this->faker->text(),
            'rating' => $this->faker->randomDigit(),
            'cover' => $cover_name,
        ];
    }
}
