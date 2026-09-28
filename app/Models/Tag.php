<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * ความสัมพันธ์: แท็กนี้มีได้หลายบทความ (belongsToMany)
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }
}
