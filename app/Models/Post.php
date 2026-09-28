<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'status',
        'published_at',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * ความสัมพันธ์: บทความนี้เขียนโดย User คนเดียว (belongsTo)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ความสัมพันธ์: บทความนี้อยู่ในได้หลายหมวดหมู่ (belongsToMany)
     */
    public function postCategories()
    {
        return $this->belongsToMany(PostCategory::class, 'post_post_category');
    }

    /**
     * ความสัมพันธ์: บทความนี้มีได้หลายแท็ก (belongsToMany)
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
}
