<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product.images') // โหลดข้อมูลสินค้าและรูปภาพ
            ->where('customer_id', Auth::guard('customer')->id())
            ->get();
    
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        // dd($cartItems);
        return view('cart.index', compact('cartItems', 'subtotal'));
    }
    

    // public function add(Request $request, $id)
    // {
    //     $product = Product::findOrFail($id);

    //     $cartItem = CartItem::where('customer_id', Auth::guard('customer')->id())
    //         ->where('product_id', $id)
    //         ->first();
 
    //     if ($cartItem) {
    //         $cartItem->increment('quantity');
    //     } else {
    //         CartItem::create([
    //             'customer_id' => Auth::guard('customer')->id(),
    //             'product_id' => $id,
    //             'quantity' => $request->quantity ?? 1,
    //             'price' => $product->price,
    //         ]);
    //     }

    //     return back()->with('success', 'Product added to cart!');
    // }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $customerId = Auth::guard('customer')->id();

        $variantId = $request->input('variant_id');
        $variant = null;
        $price = $product->price;

        // ถ้าเลือก variant ให้เช็ค availability ของ variant (ถ้าคุณใช้ฟิลด์นี้ใน variant ด้วย)
        if ($variantId) {
            $variant = $product->variants()->find($variantId);
            if ($variant) {
                $price = $variant->price;

                // ตรวจว่า variant หมดสต็อก (ถ้ามีฟิลด์ availability หรือ stock_quantity ใน variant)
                if (isset($variant->availability) && $variant->availability === 'Out of Stock') {
                    return back()->with('error', 'This product variant is out of stock.');
                }
            }
        }

        // ตรวจว่า product หมดสต็อก
        if ($product->availability === 'Out of Stock') {
            return back()->with('error', 'This product is out of stock.');
        }

        $cartItem = CartItem::where('customer_id', $customerId)
            ->where('product_id', $id)
            ->when($variantId, function ($query) use ($variantId) {
                return $query->where('variant_id', $variantId);
            })
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'customer_id' => $customerId,
                'product_id' => $id,
                'variant_id' => $variantId,
                'quantity' => $request->quantity ?? 1,
                'price' => $price,
            ]);
        }

        return back()->with('success', 'Product added to cart!');
    }



    public function remove($id)
    {
        $cartItem = CartItem::find( $id);

        if ($cartItem) {
            $cartItem->delete();
        }
    
        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
    
    public function update(Request $request)
    {
        $cartItem = CartItem::where('id', $request->id)->where('customer_id', Auth::guard('customer')->id())->first();
    
        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            return response()->json(['success' => true, 'message' => 'Cart updated successfully.']);
        }
    
        return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
    }
    
    public function checkout()
    {
        $customerId = \Auth::guard('customer')->id();
    
        if (!$customerId) {
            return redirect()->route('home')->with('error_auth', 'Please log in to proceed to checkout.');
        }
    
        $cartItems = \App\Models\CartItem::with(['product', 'variant'])
            ->where('customer_id', $customerId)
            ->get();
    
        $subtotal = $cartItems->sum(function ($item) {
            $price = $item->variant ? $item->variant->price : $item->product->price;
            return $price * $item->quantity;
        });
    
        $customer = \App\Models\Customer::find($customerId);
    
        return view('cart.checkout', compact('customer', 'cartItems', 'subtotal'));
    }
    
    
}
