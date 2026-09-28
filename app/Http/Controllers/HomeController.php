<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function index()
    {
        $products = Product::where('active', 1)
            ->whereHas('category', function ($query) {
                $query->where('active', 1);
            })
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();


        // เช็ค active category ด้วย
        $mainCategoryIds = [1, 28, 62, 84];
        $data = [];

        foreach ($mainCategoryIds as $catId) {
            // เอา category ids ทั้งหมดที่ active
            $categoryIds = Category::getAllNestedCategoryIds($catId);

            // ตรงนี้ถ้าใน Category model → getAllNestedCategoryIds ต้องกรอง active ด้วยนะ
            // หรือถ้าไม่ได้กรอง → เรามากรอง products อีกชั้นก็ได้

            $count = Product::where('active', 1) // <--- เพิ่มเช็ค active
                ->whereIn('category_id', $categoryIds)
                ->count();

            $data["cate_{$catId}"] = $count;
        }

        // Restock → product ต้อง active ด้วย
        $products_restock = \App\Models\StockLog::where('type', 'restock')
            ->whereHas('product', function ($query) {
                $query->where('active', 1);
            })
            // ->with('product')
            ->orderBy('updated_at', 'desc')
            ->limit(4)
            ->get();

        // Pre-Order Items
        $products_preorder = Product::where('active', 1)
            ->where('availability', 'Pre-Order')
            ->whereHas('category', function ($query) {
                $query->where('active', 1);
            })
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        return view('welcome', compact('products', 'products_restock', 'products_preorder', 'data'));
    }
}
