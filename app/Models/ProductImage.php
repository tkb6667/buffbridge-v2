<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'image_path'];

    public function getUrlAttribute(): ?string
    {
        if (! $this->image_path) {
            return null;
        }

        $path = ltrim($this->image_path, '/');

        if (Storage::disk('public')->exists($path)) {
            return '/storage/'.$path;
        }

        $adminUrl = rtrim((string) config('app.admin_url'), '/');

        return $adminUrl !== ''
            ? $adminUrl.'/storage/'.$path
            : '/storage/'.$path;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
