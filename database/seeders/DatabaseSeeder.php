<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Company;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Company::factory()->count(5)->create();

        Category::factory()->count(10)->state(fn (): array => [
            'title' => fake()->unique()->randomElement([
                'Programming', 'Guides', 'Examples', 'Demo\'s', 'Opinions',
                'Design', 'Benchmark', 'Future', 'Security', 'General',
            ]),
        ])->create();

        Tag::factory()->count(12)->state(fn (): array => [
            'name' => fake()->unique()->randomElement([
                'PHP', 'Laravel', 'Livewire', 'Alpine', 'Tailwind',
                'MySQL', 'Performance', 'Question', 'Idea', 'Bug',
                'Feature', 'Issue',
            ]),
        ])->create();

        User::factory()
            ->count(20)
            ->has(
                Blog::factory()
                    ->count(10)
                    ->state(fn (): array => [
                        'category_id' => fake()->randomElement(range(1, 10)),
                    ])
                    ->afterCreating(function (Blog $blog): void {
                        $blog->update([
                            'order' => $blog->id,
                            'thumbnail' => 'https://picsum.photos/id/'.$blog->id.'/32/32',
                        ]);

                        for ($i = 0; $i < random_int(0, 3); $i++) {
                            $blog->tags()->attach(
                                fake()->unique()->randomElement(range(1, 12))
                            );
                        }

                        fake()->unique(true);
                    })
            )
            ->state(fn (): array => [
                'company_id' => fake()->randomElement(range(1, 5)),
            ])
            ->create();
    }
}
