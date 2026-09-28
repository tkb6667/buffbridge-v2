<x-guest-layout>
    <div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_1">
            <div class="content_wrap">
                <h1 class="page_title">History</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="/">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <a class="breadcrumbs_item all" href="/products">Shop</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">History</span>
                </div>
            </div>
        </div>
    </div>
        <div class="page_content_wrap page_paddings_yes">
    <div class="content_wrap">
        {{-- <h1 style="margin-bottom: 1rem;">My Order History</h1> --}}

        @if($orders->isEmpty())
            <p>You have no orders yet.</p>
        @else
            @foreach($orders as $order)
                <div style="border: 1px solid #ddd; padding: 1rem; margin-bottom: 2rem; border-radius: 8px;">
                    <strong>Order NO:</strong> #ORD-{{ $order->created_at->timestamp }}<br>
                    <strong>Date:</strong> {{ $order->created_at->format('d M Y H:i') }}<br>
                    <strong>Status:</strong> {{ ucfirst($order->status) }}<br>
                    <strong>Total:</strong> {{ number_format($order->total_price, 2) }}฿

                    <table style="width: 100%; margin-top: 1rem; border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: #f7f7f7;">
                                <th style="padding: 8px; border: 1px solid #ccc;">Product</th>
                                <th style="padding: 8px; border: 1px solid #ccc;">Quantity</th>
                                <th style="padding: 8px; border: 1px solid #ccc;">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                                <tr>
                                    <td style="padding: 8px; border: 1px solid #ccc;">
                                        <a href="{{ route('products.show', $item->product->id) }}">
                                            {{ $item->product->name ?? 'N/A' }}
                                        </a>
                                    </td>

                                    <td style="padding: 8px; border: 1px solid #ccc;">
                                        {{ $item->quantity }}
                                    </td>
                                    <td style="padding: 8px; border: 1px solid #ccc;">
                                        {{ number_format($item->price, 2) }}฿
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach

            {{-- Pagination --}}
            <div style="text-align: center;">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
    </div>
</x-guest-layout>
