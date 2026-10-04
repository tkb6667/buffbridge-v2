<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $casts = [
        'is_active' => 'boolean',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    protected $appends = [
        'image_url',
        'mobile_image_url',
    ];

    public function getImageUrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->image_path);
    }

    public function getMobileImageUrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->mobile_image_path) ?: $this->image_url;
    }

    private function resolveMediaUrl(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        $storagePath = '/'.ltrim($path, '/');

        if (! str_starts_with($storagePath, '/storage/')) {
            $storagePath = '/storage/'.ltrim($storagePath, '/');
        }

        $baseUrl = rtrim((string) config('app.banner_media_url'), '/');

        if ($baseUrl === '') {
            return $storagePath;
        }

        $requestHost = app()->bound('request')
            ? request()->getHost()
            : (parse_url((string) config('app.url'), PHP_URL_HOST) ?: 'localhost');

        return str_replace('{host}', $requestHost, $baseUrl).$storagePath;
    }
}
