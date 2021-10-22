<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    
    // public function getSlugAttribute(): string
    // {
    //     return str_slug($this->title);
    // }

    // public function getUrlAttribute(): string
    // {
    //     return action([App\Http\Controllers\CategoryController::class, 'show'], [$this->id, $this->slug]);
    // }
}
