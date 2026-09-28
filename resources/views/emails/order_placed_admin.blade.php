<h2>New Order #{{ $order->id }}</h2>
<p>Created At: {{ optional($order->created_at)->format('Y-m-d H:i') }}</p>
<p>Status: {{ $order->status ?? '-' }} | Payment: {{ $order->payment_type ?? '-' }}</p>
<p>Total: {{ number_format($order->total_price, 2) }}</p>

<h3>Customer Details</h3>
<table border="1" cellpadding="6" cellspacing="0">
    <tbody>
        <tr>
            <td><strong>Name</strong></td>
            <td>{{ $order->billing_first_name ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Phone</strong></td>
            <td>{{ $order->billing_phone ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{{ $order->billing_email ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td>
                {{ $order->billing_house_number ?? '' }}
                {{ $order->billing_subdistrict ? ' ' . $order->billing_subdistrict : '' }}
                {{ $order->billing_district ? ' ' . $order->billing_district : '' }}
                {{ $order->billing_province ? ' ' . $order->billing_province : '' }}
                {{ $order->billing_postcode ? ' ' . $order->billing_postcode : '' }}
            </td>
        </tr>
    </tbody>
</table>

<h3>Items</h3>
<table border="1" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>SKU</th>
            <th>Product</th>
            <th>Brand</th>
            <th>Variant</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->orderItems as $item)
            <tr>
                <td>{{ optional($item->product)->product_code ?? '-' }}</td>
                <td>{{ optional($item->product)->name ?? '#' . $item->product_id }}</td>
                <td>{{ optional($item->product)->brand ?? '-' }}</td>
                <td>{{ optional($item->variant)->type }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price, 2) }}</td>
                <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
