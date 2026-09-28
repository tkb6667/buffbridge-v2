<x-guest-layout>
    <x-slot name="style">
        <style>
                  body{
            background-color:white;
        }
        </style>
    </x-slot>
    <style>
        .sc_form_address_field{
            text-align: center !important;
        }
    </style>
        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/skin.css') }}" type="text/css" media="all" /> --}}
    <div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_1">
            <div class="content_wrap">
                <h1 class="page_title">Your cart</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="/">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <a class="breadcrumbs_item all" href="/products">Shop</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Your cart</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumbs -->
    <!-- Page Content -->
    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <!-- Content -->
            <div class="content">
                <article class="post_item post_item_single">
                    <section class="post_content">
                        <div class="woocommerce">
                            <div class="woocommerce">
                                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                <td class="product-remove">
                                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="remove" onclick="return confirm('Are you sure?')">&times;</button>
                                                    </form>
                                                </td>
                                                
                                                <td class="product-thumbnail">
                                                    <a href="{{ route('products.show', $item->product->id) }}">
                                                        @if ($item->product->images->isNotEmpty())
                                                            <img src="{{ env('APP_ADMIN_URL').'/storage/'. $item->product->images->first()->image_path }}" alt="{{ $item->product->name }}" style="max-width: 100%;">
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="{{ route('products.show', $item->product->id) }}">
                                                        {{ $item->product->name }}
                                                    </a>
                                                    @if ($item->variant)
                                                        <p style="margin: 0; font-size: 0.9em; color: #666;">Variant: {{ $item->variant->type }}</p>
                                                    @endif
                                                </td>
                                                <td class="product-price">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol"></span>{{ number_format($item->price, 2) }}฿
                                                    </span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <input type="number" class="input-text qty text update-cart" data-id="{{ $item->id }}" step="1" min="1" value="{{ $item->quantity }}" />
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol"></span>{{ number_format($item->price * $item->quantity, 2) }}฿
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            
                                <div class="cart-collaterals">
                                    <div class="cart_totals">
                                        <h2>Cart totals</h2>
                                        <table class="shop_table shop_table_responsive">
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td data-title="Subtotal">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol"></span>{{ number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 2) }}฿
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td data-title="Total">
                                                    <strong>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol"></span>{{ number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 2) }}฿
                                                        </span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="{{ route('checkout.index') }}" class="checkout-button button alt wc-forward">
                                                Proceed to checkout
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </article>
            </div>
            <!-- /Content -->
        </div>
    </div>
    <x-slot name="script">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.update-cart').forEach(input => {
                    input.addEventListener('change', function() {
                        let itemId = this.dataset.id;
                        let newQty = this.value;

                        fetch("{{ route('cart.update') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                id: itemId,
                                quantity: newQty
                            })
                        }).then(response => response.json()).then(data => {
                            if (data.success) {
                                window.location.reload();
                            }
                        });
                    });
                });
            });
        </script>
    </x-slot>
</x-guest-layout>
