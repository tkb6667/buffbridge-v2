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

    public function getFeaturedImageUrlAttribute(): ?string
    {
        return $this->resolveBlogMediaUrl($this->featured_image);
    }

    public function getContentWithMediaUrlsAttribute(): string
    {
        return preg_replace_callback(
            '/(<img\\b[^>]*\\bsrc\\s*=\\s*["\'])([^"\']+)(["\'])/i',
            fn (array $matches) => $matches[1].$this->resolveBlogMediaUrl($matches[2]).$matches[3],
            (string) $this->content
        ) ?? (string) $this->content;
    }

    private function resolveBlogMediaUrl(?string $url): ?string
    {
        if (!$url) {
            return null;
        }

        $path = parse_url($url, PHP_URL_PATH) ?: $url;
        $storagePath = '/'.ltrim($path, '/');

        if (!str_starts_with($storagePath, '/storage/posts/')) {
            return $url;
        }

        $host = parse_url($url, PHP_URL_HOST);
        $isRelative = $host === null;

        if (!$isRelative && !$this->isLocalHost($host)) {
            return $url;
        }

        $baseUrl = rtrim((string) config('app.blog_media_url'), '/');

        if ($baseUrl === '') {
            return $storagePath;
        }

        $requestHost = app()->bound('request')
            ? request()->getHost()
            : (parse_url((string) config('app.url'), PHP_URL_HOST) ?: 'localhost');

        return str_replace('{host}', $requestHost, $baseUrl).$storagePath;
    }

    private function isLocalHost(string $host): bool
    {
        if (in_array($host, ['localhost', '127.0.0.1', '0.0.0.0', '::1'], true)) {
            return true;
        }

        return filter_var($host, FILTER_VALIDATE_IP) !== false
            && filter_var(
                $host,
                FILTER_VALIDATE_IP,
                FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
            ) === false;
    }

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
