<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlacedAdmin;
use App\Models\Setting;

class CheckoutController extends Controller
{
    // แสดงหน้า Checkout
    public function index()
    {
        $customerId = \Auth::guard('customer')->id(); // ดึง ID ของลูกค้าปัจจุบัน

        // ตรวจสอบว่ามีลูกค้าเข้าสู่ระบบหรือไม่
        if (!$customerId) {
            return redirect()->route('home')->with('error_auth', 'Please log in to proceed to checkout.');
        }

        // ดึงข้อมูลสินค้าที่อยู่ในตะกร้าของลูกค้า
        $cartItems = \App\Models\CartItem::with(['product', 'variant'])
            ->where('customer_id', $customerId)
            ->get();

        // คำนวณราคาย่อย (subtotal)
        $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        // ดึงข้อมูลที่อยู่ของลูกค้า
        $customer = \App\Models\Customer::find($customerId);
        // dd($customer);
        return view('cart.checkout', compact('customer', 'cartItems', 'subtotal'));
    }

    public function process(Request $request)
    {
        $customerId = Auth::guard('customer')->id();
        if (!$customerId) {
            return redirect()->route('home')->with('error', 'Please log in to proceed.');
        }

        $cartItems = CartItem::with(['product', 'variant'])->where('customer_id', $customerId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // เอา logic ตัดสต็อกออกตามคำขอ: ไม่ตรวจสอบและไม่ลดสต็อกในขั้นตอนนี้

        $order = null;

        DB::transaction(function () use ($request, $customerId, $cartItems, &$order) {
            $order = Order::create([
                'customer_id' => $customerId,
                'total_price' => $cartItems->sum(function ($item) {
                    $price = $item->variant ? $item->variant->price : $item->product->price;
                    return $price * $item->quantity;
                }),
                'billing_first_name' => $request->billing_first_name,
                'billing_house_number' => $request->billing_house_number,
                'billing_subdistrict' => $request->billing_subdistrict,
                'payment_type' => $request->payment_type,
                'payment_slip' => $request->hasFile('payment_slip')
                    ? $request->file('payment_slip')->store('slips', 'public')
                    : null,
                'billing_district' => $request->billing_district,
                'billing_province' => $request->billing_province,
                'billing_postcode' => $request->billing_postcode,
                'billing_phone' => $request->billing_phone,
                'billing_email' => $request->billing_email,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                // สร้าง order item
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'variant_id' => $item->variant_id,
                    'quantity' => $item->quantity,
                    'price' => $item->variant ? $item->variant->price : $item->product->price,
                ]);
            }
        });

        $order->load(['orderItems.product', 'orderItems.variant']);
        $setting = Setting::first();
        $raw = $setting?->cc_emails;
        if (!$raw) {
            $raw = (string) config('mail.order_notify_emails', env('ORDER_NOTIFY_EMAILS', ''));
        }
        $emails = array_values(array_filter(array_map('trim', preg_split('/[,;]+/', (string) $raw))));
        if (count($emails) > 0) {
            $to = array_shift($emails);
            Mail::to($to)->cc($emails)->send(new OrderPlacedAdmin($order));
        }

        CartItem::where('customer_id', $customerId)->delete();

        return redirect()->route('home')->with('success', 'Your order has been placed successfully!');
    }
}
