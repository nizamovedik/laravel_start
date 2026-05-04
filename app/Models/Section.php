<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin Eloquent
 * @mixin IdeHelperSection
 */
class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class);
    }
}
