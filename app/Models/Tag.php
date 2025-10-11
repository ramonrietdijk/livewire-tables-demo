<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 */
class Tag extends Model
{
    /** @use HasFactory<TagFactory> */
    use HasFactory;

    /** @return BelongsToMany<Blog, $this> */
    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class);
    }

    protected static function newFactory(): TagFactory
    {
        return TagFactory::new();
    }
}
