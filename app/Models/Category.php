<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function getAllNestedCategoryIds($parentId): \Illuminate\Support\Collection
    {
        $category = self::with('children')->find($parentId);
    
        // ตรวจสอบว่า category มีอยู่หรือไม่
        if (!$category) {
            return collect(); // ถ้าไม่พบ category ให้คืนค่าเป็น collection ว่าง
        }
    
        $ids = collect([$category->id]);
    
        foreach ($category->children as $child) {
            $ids = $ids->merge(self::getAllNestedCategoryIds($child->id));
        }
    
        return $ids;
    }

}
