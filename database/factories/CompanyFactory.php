<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Company> */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
        ];
    }
}
