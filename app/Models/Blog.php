<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Database\Factories\BlogFactory;

/**
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $author_id
 * @property ?int $category_id
 * @property bool $published
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 * @property ?Carbon $deleted_at
 */
class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'published' => 'boolean',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected static function newFactory(): BlogFactory
    {
        return BlogFactory::new();
    }
}
