<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function getAllNestedCategoryIds(
        $parentId,
        ?Collection $categories = null
    ): Collection {
        $categories ??= self::query()->get(['id', 'parent_id']);

        if (! $categories->contains('id', (int) $parentId)) {
            return collect();
        }

        $childrenByParent = $categories->groupBy('parent_id');
        $ids = collect();
        $pending = [(int) $parentId];

        while ($pending !== []) {
            $categoryId = array_pop($pending);
            $ids->push($categoryId);

            $childIds = $childrenByParent
                ->get($categoryId, collect())
                ->pluck('id')
                ->reverse()
                ->all();

            array_push($pending, ...$childIds);
        }

        return $ids;
    }

    public static function menuTree(): Collection
    {
        $request = app()->bound('request') ? request() : null;

        if ($request?->attributes->has('buffbridge.category_menu')) {
            return $request->attributes->get('buffbridge.category_menu');
        }

        $categories = self::query()
            ->whereNull('parent_id')
            ->with('children')
            ->get();

        $request?->attributes->set('buffbridge.category_menu', $categories);

        return $categories;
    }
}
