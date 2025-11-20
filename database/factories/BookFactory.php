<?php

namespace Database\Factories;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{

    protected $model = Books::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'isbn' => fake()->isbn13(),
            'published_year' => fake()->year(),
            'author_id' => Authors::factory(),
        ];
    }
}
