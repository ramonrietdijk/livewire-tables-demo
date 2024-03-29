<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property ?int $company_id
 * @property bool $is_admin
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 */
class User extends Model
{
    use HasFactory;

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function uppercase(): Attribute
    {
        return Attribute::make(
            get: fn (): string => strtoupper($this->name),
        );
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'author_id');
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
