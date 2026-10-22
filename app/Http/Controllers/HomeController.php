<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\StockLog;
use App\Support\SeoMeta;

class HomeController extends Controller
{
    //
    public function index()
    {
        $now = now();
        $banners = Banner::query()
            ->where('is_active', true)
            ->where(function ($query) use ($now) {
                $query->whereNull('start_at')->orWhere('start_at', '<=', $now);
            })
            ->where(function ($query) use ($now) {
                $query->whereNull('end_at')->orWhere('end_at', '>=', $now);
            })
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $products = Product::where('active', 1)
            ->with([
                'images' => fn ($query) => $query
                    ->select(['id', 'product_id', 'image_path'])
                    ->orderBy('id')
                    ->limit(1),
                'variants' => fn ($query) => $query
                    ->select(['id', 'product_id', 'price'])
                    ->orderBy('id')
                    ->limit(1),
            ])
            ->whereHas('category', function ($query) {
                $query->where('active', 1);
            })
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        // เช็ค active category ด้วย
        $mainCategoryIds = [1, 28, 62, 84];
        $categories = Category::query()->get(['id', 'parent_id']);
        $categoryGroups = collect($mainCategoryIds)->mapWithKeys(
            fn (int $categoryId) => [
                $categoryId => Category::getAllNestedCategoryIds($categoryId, $categories),
            ]
        );
        $productCountsByCategory = Product::query()
            ->where('active', 1)
            ->whereIn('category_id', $categoryGroups->flatten()->unique())
            ->selectRaw('category_id, COUNT(*) as aggregate')
            ->groupBy('category_id')
            ->pluck('aggregate', 'category_id');
        $data = [];

        foreach ($categoryGroups as $catId => $categoryIds) {
            $data["cate_{$catId}"] = $categoryIds->sum(
                fn (int $categoryId) => (int) $productCountsByCategory->get($categoryId, 0)
            );
        }

        // Restock → product ต้อง active ด้วย
        $products_restock = StockLog::where('type', 'restock')
            ->with([
                'product.images' => fn ($query) => $query
                    ->select(['id', 'product_id', 'image_path'])
                    ->orderBy('id')
                    ->limit(1),
                'product.variants' => fn ($query) => $query
                    ->select(['id', 'product_id', 'price'])
                    ->orderBy('id')
                    ->limit(1),
            ])
            ->whereHas('product', function ($query) {
                $query->where('active', 1);
            })
            // ->with('product')
            ->orderBy('updated_at', 'desc')
            ->limit(4)
            ->get();

        // Pre-Order Items
        $products_preorder = Product::where('active', 1)
            ->with([
                'images' => fn ($query) => $query
                    ->select(['id', 'product_id', 'image_path'])
                    ->orderBy('id')
                    ->limit(1),
                'variants' => fn ($query) => $query
                    ->select(['id', 'product_id', 'price'])
                    ->orderBy('id')
                    ->limit(1),
            ])
            ->where('availability', 'Pre-Order')
            ->whereHas('category', function ($query) {
                $query->where('active', 1);
            })
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        $seo = SeoMeta::home();

        return view('welcome', compact('banners', 'products', 'products_restock', 'products_preorder', 'data', 'seo'));
    }
}
