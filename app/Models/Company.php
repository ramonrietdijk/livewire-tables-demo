<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 */
class Company extends Model
{
    /** @use HasFactory<CompanyFactory> */
    use HasFactory;

    /** @return HasMany<User, $this> */
    public function employees(): HasMany
    {
        return $this->hasMany(User::class);
    }

    protected static function newFactory(): CompanyFactory
    {
        return CompanyFactory::new();
    }
}
