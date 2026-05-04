<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperNewsSection
 */
class NewsSection extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table  = 'news_section';

}
