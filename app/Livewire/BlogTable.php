<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Enumerable;
use RamonRietdijk\LivewireTables\Actions\Action;
use RamonRietdijk\LivewireTables\Columns\BooleanColumn;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Columns\DateColumn;
use RamonRietdijk\LivewireTables\Columns\ImageColumn;
use RamonRietdijk\LivewireTables\Columns\SelectColumn;
use RamonRietdijk\LivewireTables\Filters\BooleanFilter;
use RamonRietdijk\LivewireTables\Filters\DateFilter;
use RamonRietdijk\LivewireTables\Filters\SelectFilter;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;

class BlogTable extends LivewireTable
{
    protected string $model = Blog::class;

    protected bool $useReordering = true;

    protected bool $deferLoading = true;

    protected function columns(): array
    {
        return [
            ImageColumn::make(__('Thumbnail'), 'thumbnail'),

            Column::make(__('Title'), 'title')
                ->sortable()
                ->searchable(),

            SelectColumn::make(__('Category'), 'category.title')
                ->options(
                    Category::query()->get()->pluck('title', 'title')->toArray()
                )
                ->sortable()
                ->searchable(),

            Column::make(__('Author'), 'author.name')
                ->sortable()
                ->searchable(),

            Column::make(__('Company'), 'author.company.name')
                ->sortable()
                ->searchable(),

            BooleanColumn::make(__('Published'), 'published')
                ->sortable(),

            DateColumn::make(__('Created At'), 'created_at')
                ->sortable()
                ->format('F jS, Y'),
        ];
    }

    protected function filters(): array
    {
        return [
            BooleanFilter::make(__('Published'), 'published'),

            SelectFilter::make(__('Category'), 'category_id')
                ->options(
                    Category::query()->get()->pluck('title', 'id')->toArray()
                ),

            SelectFilter::make(__('Author'), 'author_id')
                ->options(
                    User::query()->get()->pluck('name', 'id')->toArray()
                ),

            DateFilter::make(__('Created At'), 'created_at'),
        ];
    }

    protected function actions(): array
    {
        return [
            Action::make(__('Publish All'), 'publish_all', function (): void {
                Blog::query()->update(['published' => true]);
            })->standalone(),

            Action::make(__('Publish'), 'publish', function (Enumerable $models): void {
                /** @var Blog $model */
                foreach ($models as $model) {
                    $model->published = true;
                    $model->save();
                }
            }),

            Action::make(__('Unpublish'), 'unpublish', function (Enumerable $models): void {
                /** @var Blog $model */
                foreach ($models as $model) {
                    $model->published = false;
                    $model->save();
                }
            }),
        ];
    }
}
