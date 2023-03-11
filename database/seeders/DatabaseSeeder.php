<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Company::factory()->count(5)->create();

        Category::factory()->count(10)->create();

        User::factory()
            ->count(20)
            ->has(
                Blog::factory()
                    ->count(10)
                    ->state(fn (): array => [
                        'category_id' => fake()->randomElement(range(1, 10)),
                    ])
            )
            ->state(fn (): array => [
                'company_id' => fake()->randomElement(range(1, 5)),
            ])
            ->create();
    }
}
