<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

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

