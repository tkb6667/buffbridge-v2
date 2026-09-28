<?php

// app/Http/Controllers/OrderHistoryController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderHistoryController extends Controller
{
    public function history()
    {
        $customerId = auth('customer')->id();
        $orders = \App\Models\Order::with(['orderItems.product'])
                    ->where('customer_id', $customerId)
                    ->latest()
                    ->paginate(5); // แบ่งหน้า 5 รายการต่อหน้า

        return view('order.history', compact('orders'));
    }

}
