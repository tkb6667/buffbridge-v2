<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
 
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $product->reviews()->create([
            'customer_id' => auth()->id(),
            'rating' => $request->rating,
            'review' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
