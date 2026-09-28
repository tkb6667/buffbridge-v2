<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * ความสัมพันธ์: หมวดหมู่นี้มีได้หลายบทความ (belongsToMany)
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_post_category');
    }
}
