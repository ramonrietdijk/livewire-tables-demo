<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

/** @extends Factory<Blog> */
class BlogFactory extends Factory
{
    protected $model = Blog::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'title' => fake()->text(100),
            'body' => fake()->paragraph(),
            'thumbnail' => 'https://picsum.photos/32/32',
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'published' => fake()->boolean(),
            'order' => fake()->randomNumber(),
            'settings' => null,
        ];
    }

    public function published(bool $published = true): static
    {
        return $this->state([
            'published' => $published,
        ]);
    }

    public function deleted(): static
    {
        return $this->state(fn (): array => [
            'deleted_at' => fake()->dateTime(),
        ]);
    }
}
