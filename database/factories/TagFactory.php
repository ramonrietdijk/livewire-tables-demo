<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Tag> */
class TagFactory extends Factory
{
    protected $model = Tag::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
        ];
    }
}
