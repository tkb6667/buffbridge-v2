<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $categoryIds = [];

        foreach ([1, 28, 62, 84] as $parentId) {
            $ids = Category::getAllNestedCategoryIds($parentId); // คืน Collection
            $categoryIds = array_merge($categoryIds, $ids->toArray()); // ✅ toArray
        }

        $categoryIds = array_unique($categoryIds); // กันซ้ำ

            $query = Product::with(['category', 'category2', 'images'])->whereIn('category_id', $categoryIds) // ใช้ $categoryIds ที่ได้มา
                ->where('active', 1);


            // 🔍 ฟิลเตอร์ตามคำค้นหา (ชื่อสินค้า หรือรายละเอียดอื่น ๆ)
        if ($request->has('search') && !empty($request->search)) {
            $keyword = $request->search;

            $query->where(function ($q) use ($keyword) {
                $q->where('product_code', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('brand', 'LIKE', "%{$keyword}%")
                ->orWhere('availability', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%");
            }); // ← ✅ ปิดวงเล็บให้ครบ
        }

        // 🧭 ฟิลเตอร์ตามหมวดหมู่
        if ($request->has('category') && !empty($request->category)) {
            $category = Category::find($request->category);

            if ($category) {
                $categoryIds = Category::where('id', $category->id)
                    ->orWhere('parent_id', $category->id)
                    ->orWhereIn('parent_id', Category::where('parent_id', $category->id)->pluck('id'))
                    ->pluck('id')
                    ->toArray();

                $query->where(function ($q) use ($categoryIds) {
                    $q->whereIn('category_id', $categoryIds)
                    ->orWhereIn('category_id2', $categoryIds);
                });
            }
        }

    // ... ส่วนของการ filter ตาม search และ category ...

        // 📦 ถ้า restock = true
        if ($request->get('restock') == 'true') {
            $query = $query
                ->where('stock_quantity', '>', 0)
                ->whereHas('stockLogs')
                ->with(['stockLogs' => function ($q) {
                    $q->latest()->limit(1);
                }])
                ->orderByDesc(
                    \DB::raw('(SELECT MAX(created_at) FROM stock_logs WHERE stock_logs.product_id = products.id)')
                );
        }

        if($request->has('min_price') && $request->has('max_price')){
            $minPrice = $request->get('min_price');
            $maxPrice = $request->get('max_price');

            if ($minPrice !== null && $maxPrice !== null) {
                $query->whereBetween('price', [$minPrice, $maxPrice]);
            }

        }

    // ✳️ Apply sorting จาก dropdown
        $orderby = $request->get('orderby');
        switch ($orderby) {

            case 'date':
                $query->orderBy('created_at', 'desc');
                break;
            case 'price':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

    // ✅ สุดท้าย .get() ทีเดียว
        $products = $query->get();

        $categories_menu = Category::with('children')->where('active', 1)->whereNull('parent_id')->get();

        return view('products.index', compact('products', 'categories_menu'));
    }




    public function show(Product $product)
    {
        // ดึงสินค้าที่อยู่ในหมวดหมู่เดียวกัน (ยกเว้นสินค้าปัจจุบัน)
        $relatedProducts = Product::where(function ($query) use ($product) {
            $query->where('category_id', $product->category_id)
                  ->orWhere('category_id2', $product->category_id)
                  ->orWhere('category_id', $product->category_id2)
                  ->orWhere('category_id2', $product->category_id2);
        })
        ->where('id', '!=', $product->id)
        ->limit(4)
        ->get();
        $product->load('reviews');

        return view('products.show', compact('product', 'relatedProducts'));
    }

}
