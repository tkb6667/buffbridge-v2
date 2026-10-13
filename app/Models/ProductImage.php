<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    private const VARIANT_WIDTHS = [480, 960];

    protected $fillable = ['product_id', 'image_path'];

    private array $publicDiskExistence = [];

    private bool $srcsetResolved = false;

    private ?string $resolvedSrcset = null;

    public function getUrlAttribute(): ?string
    {
        if (! $this->image_path) {
            return null;
        }

        $path = ltrim($this->image_path, '/');

        $existsOnPublicDisk = $this->publicDiskExistence[$path]
            ??= Storage::disk('public')->exists($path);

        return $this->resolvePublicUrl($path, $existsOnPublicDisk);
    }

    public function getSrcsetAttribute(): ?string
    {
        if ($this->srcsetResolved) {
            return $this->resolvedSrcset;
        }

        $this->srcsetResolved = true;

        if (! $this->image_path) {
            return null;
        }

        $disk = Storage::disk('public');
        $manifestPath = $this->manifestPath();

        if (! $disk->exists($manifestPath)) {
            return null;
        }

        $manifest = json_decode($disk->get($manifestPath), true);
        $manifestWidths = is_array($manifest['widths'] ?? null)
            ? $manifest['widths']
            : [];
        $widths = array_intersect(
            self::VARIANT_WIDTHS,
            array_map('intval', $manifestWidths)
        );
        $variants = [];

        foreach ($widths as $width) {
            $path = $this->variantPath($width);
            $variants[] = $this->resolvePublicUrl($path, true).' '.$width.'w';
        }

        return $this->resolvedSrcset = $variants === []
            ? null
            : implode(', ', $variants);
    }

    private function variantPath(int $width): string
    {
        $path = ltrim($this->image_path, '/');
        $directory = pathinfo($path, PATHINFO_DIRNAME);
        $filename = pathinfo($path, PATHINFO_FILENAME).'-'.$width.'w.webp';

        return ($directory === '.' ? '' : $directory.'/').$filename;
    }

    private function manifestPath(): string
    {
        $path = ltrim($this->image_path, '/');
        $directory = pathinfo($path, PATHINFO_DIRNAME);
        $filename = pathinfo($path, PATHINFO_FILENAME).'-variants.json';

        return ($directory === '.' ? '' : $directory.'/').$filename;
    }

    private function resolvePublicUrl(string $path, bool $existsOnPublicDisk): string
    {
        if ($existsOnPublicDisk) {
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
