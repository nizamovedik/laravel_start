<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperAuthor
 */
class Author extends Model
{
    use HasFactory;

    protected $guarded = [];
}
