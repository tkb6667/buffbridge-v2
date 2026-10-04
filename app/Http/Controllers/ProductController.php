<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoryIds = [];
        $categories = Category::query()->get(['id', 'parent_id']);

        foreach ([1, 28, 62, 84] as $parentId) {
            $categoryIds = array_merge(
                $categoryIds,
                Category::getAllNestedCategoryIds($parentId, $categories)->toArray()
            );
        }

        $categoryIds = array_unique($categoryIds);

        $query = Product::query()
            ->select([
                'id',
                'product_code',
                'name',
                'brand',
                'availability',
                'price',
                'category_id',
                'category_id2',
                'created_at',
            ])
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
            ->whereIn('category_id', $categoryIds)
            ->where('active', 1);

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $keyword = trim($request->search);

            $query->where(function ($q) use ($keyword) {
                $q->where('product_code', 'LIKE', "%{$keyword}%")
                    ->orWhere('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('brand', 'LIKE', "%{$keyword}%")
                    ->orWhere('availability', 'LIKE', "%{$keyword}%")
                    ->orWhere('description', 'LIKE', "%{$keyword}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Category
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {
            $category = Category::find($request->category);

            if ($category) {
                $filteredCategoryIds = Category::where('id', $category->id)
                    ->orWhere('parent_id', $category->id)
                    ->orWhereIn(
                        'parent_id',
                        Category::where('parent_id', $category->id)->pluck('id')
                    )
                    ->pluck('id')
                    ->toArray();

                $query->where(function ($q) use ($filteredCategoryIds) {
                    $q->whereIn('category_id', $filteredCategoryIds)
                        ->orWhereIn('category_id2', $filteredCategoryIds);
                });
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Availability
        |--------------------------------------------------------------------------
        */

        if ($request->filled('availability')) {
            $query->where('availability', $request->availability);
        }

        if ($request->filled('brand')) {
            $query->whereRaw('LOWER(TRIM(brand)) = ?', [
                mb_strtolower(trim((string) $request->brand)),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Restock
        |--------------------------------------------------------------------------
        */

        if ($request->boolean('restock')) {
            $query
                ->where('stock_quantity', '>', 0)
                ->whereHas('stockLogs')
                ->with([
                    'stockLogs' => function ($q) {
                        $q->latest()->limit(1);
                    },
                ])
                ->orderByDesc(
                    DB::raw(
                        '(SELECT MAX(created_at)
                        FROM stock_logs
                        WHERE stock_logs.product_id = products.id)'
                    )
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Price
        |--------------------------------------------------------------------------
        */

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        switch ($request->get('orderby', 'date')) {
            case 'price':
                $query->orderBy('price');
                break;

            case 'price-desc':
                $query->orderByDesc('price');
                break;

            default:
                $query->orderByDesc('created_at');
                break;
        }

        $products = $query->paginate(24)->withQueryString();

        $categories_menu = Category::menuTree();

        return view(
            'products.index',
            compact('products', 'categories_menu')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Live Search
    |--------------------------------------------------------------------------
    */

    public function liveSearch(Request $request)
    {
        $keyword = trim((string) $request->get('q', ''));

        if (mb_strlen($keyword) < 2) {
            return response()->json([
                'products' => [],
            ]);
        }

        $products = Product::query()
            ->with([
                'images',
                'variants',
                'category',
            ])
            ->where('active', 1)
            ->where(function ($query) use ($keyword) {
                $query
                    ->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('product_code', 'LIKE', "%{$keyword}%")
                    ->orWhere('brand', 'LIKE', "%{$keyword}%");
            })
            ->orderByRaw(
                'CASE
                    WHEN name LIKE ? THEN 1
                    WHEN product_code LIKE ? THEN 2
                    WHEN brand LIKE ? THEN 3
                    ELSE 4
                END',
                [
                    "{$keyword}%",
                    "{$keyword}%",
                    "{$keyword}%",
                ]
            )
            ->limit(6)
            ->get();

        $adminUrl = rtrim((string) env('APP_ADMIN_URL'), '/');

        return response()->json([
            'products' => $products->map(function ($product) use ($adminUrl) {
                $image = $product->images->first();

                $price = $product->variants->isNotEmpty()
                    ? $product->variants->first()->price
                    : $product->price;

                $imageUrl = null;

                if ($image && $image->image_path) {
                    $imageUrl = $adminUrl
                        ? $adminUrl . '/storage/' . ltrim($image->image_path, '/')
                        : asset('storage/' . ltrim($image->image_path, '/'));
                }

                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'code' => $product->product_code,
                    'brand' => $product->brand ?: 'BUFFBRIDGE',
                    'category' => $product->category?->name,
                    'price' => number_format((float) $price, 2),
                    'availability' => $product->availability,
                    'image' => $imageUrl,
                    'url' => route('products.show', $product->id),
                ];
            })->values(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Product Detail
    |--------------------------------------------------------------------------
    */

    public function show(Product $product)
    {
        $relatedProducts = Product::where(function ($query) use ($product) {
            $query
                ->where('category_id', $product->category_id)
                ->orWhere('category_id2', $product->category_id)
                ->orWhere('category_id', $product->category_id2)
                ->orWhere('category_id2', $product->category_id2);
        })
            ->where('id', '!=', $product->id)
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
            ->limit(4)
            ->get();

        $product->load([
            'images:id,product_id,image_path',
            'variants:id,product_id,type,price',
            'reviews.customer:id,name',
        ]);

        return view(
            'products.show',
            compact('product', 'relatedProducts')
        );
    }
}
