<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
const UNKNOWN_USER = 1;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable
    = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'content_raw',
        'is_published',
        'published_at',
        //'user_id',
    ];

/**
 * Категорія статті
 * 
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function category()
{
    //стаття належить категорії
    return $this->belongsTo(BlogCategory::class);
}

/**
 * Автор статті
 * 
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user()
{
    //стаття належить користувачу
    return $this->belongsTo(User::class);
}


    // Rest of your model code...

    /**
     * Define a factory for the BlogPost model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public static function factory()
    {
        return \Database\Factories\BlogPostFactory::new();
    }
}

