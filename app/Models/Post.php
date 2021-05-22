<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'featured_image', 'content', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The tags that belong to the post.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getRouteKeyName()
    {
        return 'title';
    }
    public function getFeaturedImageAttribute($value)
    {
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        return asset("storage/{$value}");
    }

    // public function getImageAttribute()
    // {
    //     return asset("storage/{$this->featured_image}");
    // }
}
