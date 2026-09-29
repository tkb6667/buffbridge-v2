<x-guest-layout>

    <x-slot name="style">

        <style>

            .bb-shop,.bb-shop *{box-sizing:border-box}

            .bb-shop{

                --yellow:#ffd21c;

                --text:#171717;

                --muted:#777;

                --line:#e5e5e5;

                width:100%;

                background:#fff;

                color:var(--text);

                font-family:Arial,Helvetica,sans-serif

            }

            .bb-shop a{text-decoration:none}

            .bb-container{

                width:100%;

                max-width:none;

                margin:0;

                padding:0 clamp(20px,4vw,84px)

            }

            /* HERO */

            .bb-shop-hero{

                position:relative;

                min-height:300px;

                overflow:hidden;

                color:#fff;

                background:

                    linear-gradient(90deg,rgba(0,0,0,.96),rgba(0,0,0,.84) 38%,rgba(0,0,0,.3)),

                    url('{{ asset("images/hero2.png") }}') center 42%/cover no-repeat

            }

            .bb-shop-hero:after{

                content:"";

                position:absolute;

                left:0;

                bottom:0;

                width:100%;

                height:3px;

                background:var(--yellow)

            }

            .bb-shop-hero-inner{

                position:relative;

                z-index:2;

                min-height:300px;

                display:flex;

                align-items:center

            }

            .bb-shop-hero-content{max-width:620px}

            .bb-shop-kicker{

                display:flex;

                align-items:center;

                gap:10px;

                margin-bottom:14px;

                color:var(--yellow);

                font-size:11px;

                font-weight:900;

                letter-spacing:2px;

                text-transform:uppercase

            }

            .bb-shop-kicker:before{

                content:"";

                width:32px;

                height:3px;

                background:var(--yellow)

            }

            .bb-shop-hero h1{

                margin:0;

                color:#fff;

                font-size:clamp(42px,5vw,72px);

                line-height:.9;

                font-weight:900;

                letter-spacing:-2px;

                text-transform:uppercase

            }

            .bb-shop-hero h1 span{

                display:block;

                color:var(--yellow)

            }

            .bb-shop-hero p{

                max-width:450px;

                margin:18px 0 0;

                color:#c9c9c9;

                font-size:12px;

                line-height:1.7;

                letter-spacing:1.5px;

                text-transform:uppercase

            }

            /* CATEGORY TOOLBAR */

            .bb-shop-toolbar{

                position:relative;

                z-index:20;

                background:#fff;

                border-bottom:1px solid var(--line)

            }

            .bb-toolbar-inner{

                min-height:76px;

                display:flex;

                align-items:center;

                justify-content:space-between;

                gap:20px

            }

            .bb-category-tabs{

                display:flex;

                align-items:center;

                gap:6px;

                min-width:0;

                overflow-x:auto;

                scrollbar-width:none

            }

            .bb-category-tabs::-webkit-scrollbar{display:none}

            /*

             * สำคัญ:

             * ทุกหมวดเป็น card ตลอด

             * ปกติ = เทา + ดำ

             * active = เหลือง + ดำ

             */

            .bb-category-tab{

                flex:0 0 auto;

                min-height:42px;

                display:flex!important;

                align-items:center;

                justify-content:center;

                padding:0 20px!important;

                border:0!important;

                background:#eeeeee!important;

                color:#111!important;

                font-size:10px!important;

                line-height:1!important;

                font-weight:900!important;

                text-transform:uppercase;

                white-space:nowrap;

                box-shadow:none!important;

                transition:background .2s

            }

            .bb-category-tab:hover{

                background:#e3e3e3!important;

                color:#111!important

            }

            .bb-category-tab.active{

                background:var(--yellow)!important;

                color:#111!important

            }
.bb-sort{

                flex:0 0 190px;

                position:relative;

                z-index:30

            }

            .bb-sort-form{margin:0}

            .bb-sort .bb-dropdown{width:100%}

            /* MAIN */

            .bb-shop-main{padding:42px 0 70px}

            .bb-shop-layout{

                width:100%;

                display:grid;

                grid-template-columns:235px minmax(0,1fr);

                gap:clamp(28px,2.5vw,48px);

                align-items:start

            }

            /* FILTER */

            .bb-filter-sidebar{

                min-width:0;

                position:sticky;

                top:20px;

                z-index:10

            }

            .bb-filter-block{

                padding:0 0 24px;

                margin-bottom:24px;

                border-bottom:1px solid var(--line)

            }

            .bb-filter-title{

                margin:0 0 15px;

                color:#111;

                font-size:12px;

                line-height:1;

                font-weight:900;

                letter-spacing:.7px;

                text-transform:uppercase

            }

            .bb-filter-title:after{

                content:"";

                display:block;

                width:28px;

                height:3px;

                margin-top:9px;

                background:var(--yellow)

            }

            .bb-filter-list{

                margin:0;

                padding:0;

                list-style:none

            }

            .bb-filter-list li{margin:0;padding:0}

            .bb-filter-list a{

                display:flex;

                align-items:center;

                gap:9px;

                min-height:34px;

                color:#666;

                font-size:10px;

                font-weight:700;

                text-transform:uppercase;

                transition:.2s

            }

            .bb-filter-list a:before{

                content:"";

                flex:0 0 6px;

                width:6px;

                height:6px;

                border:1px solid #999

            }

            .bb-filter-list a:hover,

            .bb-filter-list a.active{

                color:#111;

                font-weight:900

            }

            .bb-filter-list a.active:before{

                border-color:var(--yellow);

                background:var(--yellow)

            }

            .bb-filter-child{padding-left:14px}

            .bb-brand-dropdown,.bb-sort-dropdown{width:100%}

            .bb-filter-block:has(.bb-brand-dropdown){

                position:relative;

                z-index:15

            }

            .bb-brand-selected{

                display:none;

                margin-top:8px;

                color:#999;

                font-size:8px;

                font-weight:700;

                text-transform:uppercase

            }

            .bb-brand-selected.show{display:block}

            .bb-brand-selected strong{color:#111}

            /* PRICE */

            .bb-price-form{margin:0}

            .bb-price-fields{

                display:grid;

                grid-template-columns:1fr 1fr;

                gap:8px;

                margin-bottom:9px

            }

            .bb-price-input{

                width:100%;

                height:38px;

                padding:0 10px;

                border:1px solid #ddd!important;

                border-radius:0!important;

                outline:0!important;

                background:#fff!important;

                color:#111!important;

                box-shadow:none!important;

                font-size:9px!important

            }

            .bb-price-button{

                width:100%;

                height:38px;

                border:0!important;

                background:var(--yellow)!important;

                color:#111!important;

                cursor:pointer;

                font-size:9px!important;

                font-weight:900!important;

                letter-spacing:.7px;

                text-transform:uppercase

            }

            .bb-clear-filter{

                display:block;

                margin-top:10px;

                color:#999!important;

                font-size:8px;

                font-weight:800;

                text-align:center;

                text-transform:uppercase

            }

            /* PRODUCTS HEADING */

            .bb-products-content{

                width:100%;

                min-width:0

            }

            .bb-products-heading{

                min-height:42px;

                display:flex;

                align-items:flex-start;

                justify-content:space-between;

                gap:20px;

                margin-bottom:22px;

                padding-bottom:14px;

                border-bottom:1px solid var(--line)

            }

            .bb-selected-label{

                margin-bottom:7px;

                color:#c89c00;

                font-size:8px;

                font-weight:900;

                letter-spacing:1.5px;

                text-transform:uppercase

            }

            .bb-products-title{

                margin:0;

                color:#111;

                font-size:20px;

                line-height:1.1;

                font-weight:900;

                text-transform:uppercase

            }

            .bb-result-count{

                flex:0 0 auto;

                padding-top:18px;

                color:#999;

                font-size:9px;

                font-weight:800;

                text-transform:uppercase

            }

            /* PRODUCT GRID */

            .bb-product-grid{

                width:100%;

                display:grid;

                grid-template-columns:repeat(4,minmax(0,1fr));

                gap:16px

            }

            .bb-product-card{

                position:relative;

                min-width:0;

                overflow:hidden;

                border:1px solid #e0e0e0;

                background:#fff;

                transition:.25s

            }

            .bb-product-card:hover{

                transform:translateY(-3px);

                border-color:#ccc;

                box-shadow:0 12px 28px rgba(0,0,0,.08)

            }

            .bb-product-card.bb-brand-hidden{display:none}

            .bb-product-badge{

                position:absolute;

                top:12px;

                right:12px;

                z-index:5;

                min-height:27px;

                display:flex;

                align-items:center;

                justify-content:center;

                padding:0 10px;

                border-radius:3px;

                background:var(--yellow);

                color:#111;

                font-size:8px;

                font-weight:900;

                text-transform:uppercase;

                box-shadow:0 3px 8px rgba(0,0,0,.12)

            }

            .bb-product-badge.out-of-stock{

                background:#e62e43;

                color:#fff

            }

            .bb-product-badge.pre-order{background:#ffbf00}

            .bb-product-image{

                position:relative;

                width:100%;

                aspect-ratio:1/.88;

                display:flex;

                align-items:center;

                justify-content:center;

                padding:40px 20px 12px;

                overflow:hidden;

                background:#fff

            }

            .bb-product-image img{

                display:block;

                width:100%;

                height:100%;

                object-fit:contain;

                transition:transform .35s

            }

            .bb-product-card:hover .bb-product-image img{

                transform:scale(1.035)

            }

            .bb-no-image{

                width:100%;

                height:100%;

                display:flex;

                align-items:center;

                justify-content:center;

                background:#f6f6f6;

                color:#aaa;

                font-size:9px;

                font-weight:900

            }

            /* PRODUCT INFO ALWAYS VISIBLE */

            .bb-product-body{

                display:block!important;

                padding:15px 16px 16px;

                opacity:1!important;

                visibility:visible!important;

                transform:none!important

            }

            .bb-product-brand{

                display:block!important;

                min-height:12px;

                margin-bottom:7px;

                color:#999!important;

                font-size:8px;

                line-height:1.3;

                font-weight:900;

                letter-spacing:.8px;

                text-transform:uppercase;

                opacity:1!important;

                visibility:visible!important

            }

            .bb-product-name{

                display:block!important;

                min-height:40px;

                margin:0 0 8px;

                font-size:13px;

                line-height:1.5;

                font-weight:500;

                opacity:1!important;

                visibility:visible!important

            }

            .bb-product-name a{

                display:-webkit-box!important;

                overflow:hidden;

                color:#777!important;

                opacity:1!important;

                visibility:visible!important;

                -webkit-line-clamp:2;

                -webkit-box-orient:vertical

            }

            .bb-product-name a:hover{color:#555!important}

            .bb-product-rating{

                min-height:18px;

                display:flex;

                align-items:center;

                gap:2px;

                margin:0 0 12px

            }

            .bb-product-star{

                width:13px;

                height:13px;

                display:block;

                color:#ddd

            }

            .bb-product-star svg{

                display:block;

                width:100%;

                height:100%;

                fill:currentColor

            }

            .bb-product-price{

                min-height:27px;

                margin-bottom:12px;

                color:#111;

                font-size:18px;

                line-height:1.2;

                font-weight:900

            }

            .bb-product-actions{

                display:flex;

                align-items:center;

                gap:6px;

                padding-top:11px;

                border-top:1px solid #eee

            }

            .bb-action-button{

                width:34px!important;

                height:34px!important;

                display:inline-flex!important;

                align-items:center;

                justify-content:center;

                padding:0!important;

                border:0!important;

                background:transparent!important;

                color:#111!important;

                cursor:pointer

            }

            .bb-action-button:hover{

                color:#d2a300!important;

                background:#f7f7f7!important

            }

            .bb-action-button svg{

                width:17px;

                height:17px;

                fill:none;

                stroke:currentColor;

                stroke-width:1.7;

                stroke-linecap:round;

                stroke-linejoin:round

            }

            .bb-action-more{

                margin-left:auto;

                background:#f5f5f5!important

            }

            .bb-action-disabled{

                opacity:.28;

                cursor:default

            }

            .bb-empty{

                grid-column:1/-1;

                padding:80px 20px;

                border:1px solid var(--line);

                background:#fafafa;

                text-align:center

            }

            .bb-empty-line{

                width:40px;

                height:4px;

                margin:0 auto 18px;

                background:var(--yellow)

            }

            .bb-empty h3{

                margin:0 0 8px;

                color:#111;

                font-size:18px;

                font-weight:900;

                text-transform:uppercase

            }

            .bb-empty p{

                margin:0;

                color:#888;

                font-size:11px

            }

            .bb-mobile-filter-button{display:none}

            /* BENEFITS */

            .bb-shop-benefits{

                border-top:1px solid var(--line);

                background:#fff

            }

            .bb-benefits-grid{

                display:grid;

                grid-template-columns:repeat(3,1fr)

            }

            .bb-benefit{

                min-height:105px;

                display:flex;

                align-items:center;

                justify-content:center;

                gap:18px;

                padding:20px 30px;

                border-right:1px solid #ddd

            }

            .bb-benefit:last-child{border-right:0}

            .bb-benefit-icon{

                width:44px;

                height:44px;

                display:flex;

                align-items:center;

                justify-content:center

            }

            .bb-benefit-icon svg{

                width:34px;

                height:34px;

                fill:none;

                stroke:currentColor;

                stroke-width:1.7;

                stroke-linecap:round;

                stroke-linejoin:round

            }

            .bb-benefit-title{

                margin-bottom:5px;

                color:#111;

                font-size:11px;

                font-weight:900;

                text-transform:uppercase

            }

            .bb-benefit-text{

                color:#777;

                font-size:8px;

                font-weight:700;

                text-transform:uppercase

            }

            @media(min-width:1800px){

                .bb-container{padding-left:4.5%;padding-right:4.5%}

                .bb-shop-layout{grid-template-columns:250px minmax(0,1fr)}

                .bb-product-grid{grid-template-columns:repeat(5,minmax(0,1fr))}

            }

            @media(max-width:1350px){

                .bb-container{padding-left:30px;padding-right:30px}

                .bb-shop-layout{grid-template-columns:215px minmax(0,1fr);gap:28px}

                .bb-product-grid{grid-template-columns:repeat(3,minmax(0,1fr))}

            }

            @media(max-width:900px){

                .bb-container{padding-left:20px;padding-right:20px}

                .bb-shop-hero,.bb-shop-hero-inner{min-height:250px}

                .bb-shop-layout{grid-template-columns:1fr}

                .bb-filter-sidebar{

                    position:static;

                    display:none;

                    padding:20px;

                    margin-bottom:25px;

                    border:1px solid var(--line);

                    background:#fafafa

                }

                .bb-filter-sidebar.open{display:block}

                .bb-mobile-filter-button{

                    width:100%;

                    height:46px;

                    display:flex;

                    align-items:center;

                    justify-content:space-between;

                    padding:0 15px;

                    margin-bottom:20px;

                    border:1px solid #ddd!important;

                    background:#fff!important;

                    color:#111!important;

                    cursor:pointer;

                    font-size:10px!important;

                    font-weight:900!important;

                    text-transform:uppercase

                }

                .bb-mobile-filter-button span:last-child{

                    color:#c99d00;

                    font-size:18px

                }

                .bb-product-grid{

                    grid-template-columns:repeat(3,minmax(0,1fr))

                }

            }

            @media(max-width:767px){

                .bb-container{padding-left:12px;padding-right:12px}

                .bb-shop-hero{

                    min-height:220px;

                    background-position:60% center

                }

                .bb-shop-hero-inner{min-height:220px}

                .bb-shop-hero h1{font-size:39px}

                .bb-shop-hero p{

                    max-width:300px;

                    font-size:9px

                }

                .bb-toolbar-inner{

                    min-height:auto;

                    display:block;

                    padding:10px 0

                }

                .bb-category-tabs{

                    width:100%;

                    gap:5px;

                    padding-bottom:9px

                }

                .bb-category-tab{

                    min-height:38px;

                    padding:0 14px!important;

                    font-size:9px!important

                }

                .bb-sort{

                    width:100%;

                    max-width:none

                }

                .bb-shop-main{padding:25px 0 45px}

                .bb-products-heading{margin-bottom:16px}

                .bb-products-title{font-size:16px}

                .bb-result-count{

                    padding-top:17px;

                    font-size:8px

                }

                .bb-product-grid{

                    grid-template-columns:repeat(2,minmax(0,1fr));

                    gap:8px

                }

                .bb-product-image{

                    aspect-ratio:1/.92;

                    padding:34px 9px 7px

                }

                .bb-product-badge{

                    top:7px;

                    right:7px;

                    min-height:22px;

                    padding:0 7px;

                    font-size:7px

                }

                .bb-product-body{padding:10px}

                .bb-product-brand{

                    font-size:6px!important;

                    color:#999!important

                }

                .bb-product-name{

                    min-height:36px;

                    margin-bottom:6px;

                    font-size:10px

                }

                .bb-product-name a{color:#777!important}

                .bb-product-rating{margin-bottom:8px}

                .bb-product-star{width:10px;height:10px}

                .bb-product-price{

                    min-height:22px;

                    margin-bottom:8px;

                    font-size:14px

                }

                .bb-action-button{

                    width:29px!important;

                    height:29px!important

                }

                .bb-benefits-grid{grid-template-columns:1fr}

                .bb-benefit{

                    min-height:75px;

                    justify-content:flex-start;

                    padding:13px 20px;

                    border-right:0;

                    border-bottom:1px solid #ddd

                }

                .bb-benefit:last-child{border-bottom:0}

            }

            @media(max-width:380px){

                .bb-container{padding-left:9px;padding-right:9px}

                .bb-shop-hero h1{font-size:34px}

                .bb-product-grid{gap:6px}

                .bb-product-body{padding:8px}

                .bb-product-name{font-size:9px}

                .bb-product-price{font-size:13px}

            }

        </style>

    </x-slot>

    @php

        $minProductPrice = (float) \App\Models\Product::min('price');

        $maxProductPrice = (float) \App\Models\Product::max('price');

        $currentCategory = request('category');

        $allCategories = collect($categories_menu ?? [])->where('active',1);

        $selectedCategory = null;

        $selectedParent = null;

        if ($currentCategory) {

            foreach ($allCategories as $parent) {

                if ((string)$parent->id === (string)$currentCategory) {

                    $selectedCategory = $parent;

                    $selectedParent = $parent;

                    break;

                }

                foreach (($parent->children ?? collect())->where('active',1) as $child) {

                    if ((string)$child->id === (string)$currentCategory) {

                        $selectedCategory = $child;

                        $selectedParent = $parent;

                        break 2;

                    }

                }

            }

        }

        $brands = \App\Models\Product::query()

            ->whereNotNull('brand')

            ->where('brand','!=','')

            ->select('brand')

            ->distinct()

            ->orderBy('brand')

            ->pluck('brand');

        $brandOptions = ['all'=>'ALL BRANDS'];

        foreach ($brands as $brand) {

            $brandOptions[strtolower(trim($brand))] = $brand;

        }

        $sortOptions = [

            'date'=>'NEWEST',

            'price'=>'PRICE LOW - HIGH',

            'price-desc'=>'PRICE HIGH - LOW',

        ];

    @endphp

    <div class="bb-shop">

        <section class="bb-shop-hero">

            <div class="bb-container">

                <div class="bb-shop-hero-inner">

                    <div class="bb-shop-hero-content">

                        <div class="bb-shop-kicker">Buffbridge Custom Crew</div>

                        <h1>

                            Products

                            <span>Find Your Gear.</span>

                        </h1>

                        <p>

                            Selected equipment for real players.

                            Play. Customize. Be your style.

                        </p>

                    </div>

                </div>

            </div>

        </section>

        <section class="bb-shop-toolbar">

            <div class="bb-container">

                <div class="bb-toolbar-inner">

                    <nav class="bb-category-tabs">

                        <a

                            href="{{ route('products.index') }}"

                            class="bb-category-tab {{ !$currentCategory ? 'active' : '' }}"

                        >

                            All

                        </a>
                        @foreach($allCategories as $category)
                            @php
                                $isActive = $selectedParent &&
                                    (string)$selectedParent->id === (string)$category->id;
                            @endphp

                            <a
                                href="{{ route('products.index',['category'=>$category->id]) }}"
                                class="bb-category-tab {{ $isActive ? 'active' : '' }}"
                            >
                                {{ $category->name }}
                            </a>
                        @endforeach

                    </nav>

                    <div class="bb-sort">

                        <form

                            method="GET"

                            action="{{ route('products.index') }}"

                            class="bb-sort-form"

                            id="bbSortForm"

                        >

                            @foreach(['category','min_price','max_price','availability'] as $key)

                                @if(request($key))

                                    <input

                                        type="hidden"

                                        name="{{ $key }}"

                                        value="{{ request($key) }}"

                                    >

                                @endif

                            @endforeach

                            <x-bb-dropdown

                                name="orderby"

                                :options="$sortOptions"

                                :value="request('orderby','date')"

                                placeholder="NEWEST"

                                class="bb-sort-dropdown"

                            />

                        </form>

                    </div>

                </div>

            </div>

        </section>

        <main class="bb-shop-main">

            <div class="bb-container">

                <button

                    type="button"

                    class="bb-mobile-filter-button"

                    id="bbFilterToggle"

                >

                    <span>Filter Products</span>

                    <span>+</span>

                </button>

                <div class="bb-shop-layout">

                    <aside class="bb-filter-sidebar" id="bbFilterSidebar">

                        @if($brands->isNotEmpty())

                            <div class="bb-filter-block">

                                <h3 class="bb-filter-title">Brand</h3>

                                <x-bb-dropdown

                                    name="brand_filter"

                                    :options="$brandOptions"

                                    value="all"

                                    placeholder="ALL BRANDS"

                                    :searchable="true"

                                    search-placeholder="SEARCH BRAND..."

                                    class="bb-brand-dropdown"

                                />

                                <div

                                    class="bb-brand-selected"

                                    id="bbBrandSelected"

                                >

                                    Brand:

                                    <strong id="bbBrandSelectedName"></strong>

                                </div>

                            </div>

                        @endif

                        <div class="bb-filter-block">

                            <h3 class="bb-filter-title">Category</h3>

                            <ul class="bb-filter-list">

                                <li>

                                    <a

                                        href="{{ route('products.index') }}"

                                        class="{{ !$currentCategory ? 'active' : '' }}"

                                    >

                                        <span>All Products</span>

                                    </a>

                                </li>

                                @foreach($allCategories as $category)

                                    <li>

                                        <a

                                            href="{{ route('products.index',['category'=>$category->id]) }}"

                                            class="{{ (string)$currentCategory === (string)$category->id ? 'active' : '' }}"

                                        >

                                            <span>{{ $category->name }}</span>

                                        </a>

                                        @foreach(($category->children ?? collect())->where('active',1) as $child)

                                            <a

                                                href="{{ route('products.index',['category'=>$child->id]) }}"

                                                class="bb-filter-child {{ (string)$currentCategory === (string)$child->id ? 'active' : '' }}"

                                            >

                                                <span>{{ $child->name }}</span>

                                            </a>

                                        @endforeach

                                    </li>

                                @endforeach

                            </ul>

                        </div>

                        <div class="bb-filter-block">

                            <h3 class="bb-filter-title">Availability</h3>

                            @php

                                $availabilityItems = [

                                    '' => 'All',

                                    'In Stock' => 'In Stock',

                                    'Pre-Order' => 'Pre-Order',

                                    'Out of Stock' => 'Out of Stock',

                                ];

                            @endphp

                            <ul class="bb-filter-list">

                                @foreach($availabilityItems as $value=>$label)

                                    @php

                                        $query = array_filter([

                                            'category'=>request('category'),

                                            'orderby'=>request('orderby'),

                                            'min_price'=>request('min_price'),

                                            'max_price'=>request('max_price'),

                                            'availability'=>$value ?: null,

                                        ]);

                                    @endphp

                                    <li>

                                        <a

                                            href="{{ route('products.index',$query) }}"

                                            class="{{ request('availability','') === $value ? 'active' : '' }}"

                                        >

                                            <span>{{ $label }}</span>

                                        </a>

                                    </li>

                                @endforeach

                            </ul>

                        </div>

                        <div class="bb-filter-block">

                            <h3 class="bb-filter-title">Price</h3>

                            <form

                                method="GET"

                                action="{{ route('products.index') }}"

                                class="bb-price-form"

                            >

                                @foreach(['category','orderby','availability'] as $key)

                                    @if(request($key))

                                        <input

                                            type="hidden"

                                            name="{{ $key }}"

                                            value="{{ request($key) }}"

                                        >

                                    @endif

                                @endforeach

                                <div class="bb-price-fields">

                                    <input

                                        type="number"

                                        name="min_price"

                                        class="bb-price-input"

                                        value="{{ request('min_price') }}"

                                        min="{{ $minProductPrice }}"

                                        placeholder="Min"

                                    >

                                    <input

                                        type="number"

                                        name="max_price"

                                        class="bb-price-input"

                                        value="{{ request('max_price') }}"

                                        max="{{ $maxProductPrice }}"

                                        placeholder="Max"

                                    >

                                </div>

                                <button

                                    type="submit"

                                    class="bb-price-button"

                                >

                                    Apply

                                </button>

                                @if(request('min_price') || request('max_price'))

                                    <a

                                        href="{{ route('products.index',array_filter([

                                            'category'=>request('category'),

                                            'orderby'=>request('orderby'),

                                            'availability'=>request('availability')

                                        ])) }}"

                                        class="bb-clear-filter"

                                    >

                                        Clear Price Filter

                                    </a>

                                @endif

                            </form>

                        </div>

                    </aside>

                    <section class="bb-products-content">

                        <div class="bb-products-heading">

                            <div>

                                <div class="bb-selected-label">

                                    Selected Gear

                                </div>

                                <h2 class="bb-products-title">

                                    {{ $selectedCategory->name ?? 'All Products' }}

                                </h2>

                            </div>

                            <div

                                class="bb-result-count"

                                id="bbResultCount"

                            >

                                {{ $products->count() }}

                                {{ $products->count() === 1 ? 'Product' : 'Products' }}

                            </div>

                        </div>

                        <div

                            class="bb-product-grid"

                            id="bbProductGrid"

                        >

                            @forelse($products as $product)

                                @php

                                    $availabilityClass = strtolower(

                                        str_replace(' ','-',$product->availability ?? '')

                                    );

                                    $productPrice = $product->variants->count()

                                        ? $product->variants->first()->price

                                        : $product->price;

                                    $firstImage = $product->images->first();

                                    $imageUrl = $firstImage

                                        ? rtrim(env('APP_ADMIN_URL'),'/')

                                            .'/storage/'

                                            .ltrim($firstImage->image_path,'/')

                                        : null;

                                    $productBrand = trim(

                                        $product->brand ?: 'BUFFBRIDGE'

                                    );

                                @endphp

                                <article

                                    class="bb-product-card"

                                    data-brand="{{ strtolower($productBrand) }}"

                                >

                                    @if(!empty($product->availability))

                                        <div class="bb-product-badge {{ $availabilityClass }}">

                                            {{ $product->availability }}

                                        </div>

                                    @endif

                                    <a

                                        href="{{ route('products.show',$product->id) }}"

                                        class="bb-product-image"

                                        aria-label="{{ $product->name }}"

                                    >

                                        @if($imageUrl)

                                            <img

                                                src="{{ $imageUrl }}"

                                                alt="{{ $product->name }}"

                                                loading="lazy"

                                                onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"

                                            >

                                            <div

                                                class="bb-no-image"

                                                style="display:none"

                                            >

                                                NO IMAGE

                                            </div>

                                        @else

                                            <div class="bb-no-image">

                                                NO IMAGE

                                            </div>

                                        @endif

                                    </a>

                                    <div class="bb-product-body">

                                        <div class="bb-product-brand">

                                            {{ $productBrand }}

                                        </div>

                                        <h3 class="bb-product-name">

                                            <a href="{{ route('products.show',$product->id) }}">

                                                {{ $product->name }}

                                            </a>

                                        </h3>

                                        <div

                                            class="bb-product-rating"

                                            aria-label="Product rating"

                                        >

                                            @for($star=0;$star<5;$star++)

                                                <span class="bb-product-star">

                                                    <svg

                                                        viewBox="0 0 24 24"

                                                        aria-hidden="true"

                                                    >

                                                        <path d="M12 2.7l2.85 5.78 6.38.93-4.62 4.5 1.09 6.35L12 17.27l-5.7 2.99 1.09-6.35-4.62-4.5 6.38-.93L12 2.7z"/>

                                                    </svg>

                                                </span>

                                            @endfor

                                        </div>

                                        <div class="bb-product-price">

                                            {{ number_format($productPrice,2) }}฿

                                        </div>

                                        <div class="bb-product-actions">

                                            @if($product->availability !== 'Out of Stock')

                                                <button

                                                    type="button"

                                                    class="bb-action-button bb-add-cart"

                                                    data-url="{{ route('cart.add',['id'=>$product->id]) }}"

                                                    title="Add to cart"

                                                >

                                                    <svg viewBox="0 0 24 24">

                                                        <circle cx="9" cy="20" r="1.5"/>

                                                        <circle cx="18" cy="20" r="1.5"/>

                                                        <path d="M3 4h2l2.2 10.2a2 2 0 0 0 2 1.6h8.4a2 2 0 0 0 2-1.6L21 8H6"/>

                                                    </svg>

                                                </button>

                                            @else

                                                <span

                                                    class="bb-action-button bb-action-disabled"

                                                    title="Out of stock"

                                                >

                                                    <svg viewBox="0 0 24 24">

                                                        <circle cx="9" cy="20" r="1.5"/>

                                                        <circle cx="18" cy="20" r="1.5"/>

                                                        <path d="M3 4h2l2.2 10.2a2 2 0 0 0 2 1.6h8.4a2 2 0 0 0 2-1.6L21 8H6"/>

                                                    </svg>

                                                </span>

                                            @endif

                                            <a

                                                href="{{ route('products.show',$product->id) }}"

                                                class="bb-action-button"

                                                title="View product"

                                            >

                                                <svg viewBox="0 0 24 24">

                                                    <path d="M12 21s-7-4.35-7-10a4 4 0 0 1 7-2.65A4 4 0 0 1 19 11c0 5.65-7 10-7 10Z"/>

                                                </svg>

                                            </a>

                                            <a

                                                href="{{ route('products.show',$product->id) }}"

                                                class="bb-action-button bb-action-more"

                                                title="Product details"

                                            >

                                                <svg viewBox="0 0 24 24">

                                                    <circle cx="5" cy="12" r="1"/>

                                                    <circle cx="12" cy="12" r="1"/>

                                                    <circle cx="19" cy="12" r="1"/>

                                                </svg>

                                            </a>

                                        </div>

                                    </div>

                                </article>

                            @empty

                                <div class="bb-empty">

                                    <div class="bb-empty-line"></div>

                                    <h3>No Products Found</h3>

                                    <p>No products match the selected filters.</p>

                                </div>

                            @endforelse

                        </div>

                        <div

                            class="bb-empty"

                            id="bbBrandEmpty"

                            style="display:none"

                        >

                            <div class="bb-empty-line"></div>

                            <h3>No Products Found</h3>

                            <p>No products found for this brand.</p>

                        </div>

                    </section>

                </div>

            </div>

        </main>

        <section class="bb-shop-benefits">

            <div class="bb-container">

                <div class="bb-benefits-grid">

                    <div class="bb-benefit">

                        <div class="bb-benefit-icon">

                            <svg viewBox="0 0 24 24">

                                <path d="M3 5h11v10H3V5Zm11 4h3.4L21 12.6V15h-7V9Z"/>

                                <circle cx="7" cy="17" r="2"/>

                                <circle cx="18" cy="17" r="2"/>

                            </svg>

                        </div>

                        <div>

                            <div class="bb-benefit-title">

                                Fast Shipping

                            </div>

                            <div class="bb-benefit-text">

                                Thailand Wide

                            </div>

                        </div>

                    </div>

                    <div class="bb-benefit">

                        <div class="bb-benefit-icon">

                            <svg viewBox="0 0 24 24">

                                <path d="M12 2.5 19 5v5.6c0 4.6-2.8 8.8-7 10.9-4.2-2.1-7-6.3-7-10.9V5l7-2.5Z"/>

                                <path d="m8.5 12 2.2 2.2 4.8-5"/>

                            </svg>

                        </div>

                        <div>

                            <div class="bb-benefit-title">

                                Trusted Store

                            </div>

                            <div class="bb-benefit-text">

                                100% Original Products

                            </div>

                        </div>

                    </div>

                    <div class="bb-benefit">

                        <div class="bb-benefit-icon">

                            <svg viewBox="0 0 24 24">

                                <path d="M4 13v-2a8 8 0 0 1 16 0v2"/>

                                <path d="M4 13h3v6H5a1 1 0 0 1-1-1v-5Zm16 0h-3v6h2a1 1 0 0 0 1-1v-5Z"/>

                                <path d="M17 19c0 1.2-1 2-2.2 2H12"/>

                            </svg>

                        </div>

                        <div>

                            <div class="bb-benefit-title">

                                Support

                            </div>

                            <div class="bb-benefit-text">

                                Tue - Sat 13.00 - 18.30

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

    <x-slot name="script">

        <script>

            document.addEventListener('DOMContentLoaded',function(){

                const filterButton=document.getElementById('bbFilterToggle');

                const filterSidebar=document.getElementById('bbFilterSidebar');

                filterButton?.addEventListener('click',function(){

                    filterSidebar?.classList.toggle('open');

                    const icon=filterButton.querySelector('span:last-child');

                    if(icon){

                        icon.textContent=filterSidebar?.classList.contains('open')

                            ? '−'

                            : '+';

                    }

                });

                document.addEventListener('bb-dropdown:change',function(event){

                    const {name,value,label}=event.detail||{};

                    if(name==='orderby'){

                        document.getElementById('bbSortForm')?.submit();

                        return;

                    }

                    if(name!=='brand_filter') return;

                    const selected=(value||'all').trim().toLowerCase();

                    const cards=document.querySelectorAll('.bb-product-card');

                    const count=document.getElementById('bbResultCount');

                    const empty=document.getElementById('bbBrandEmpty');

                    const selectedBox=document.getElementById('bbBrandSelected');

                    const selectedName=document.getElementById('bbBrandSelectedName');

                    let visible=0;

                    cards.forEach(function(card){

                        const brand=(card.dataset.brand||'').trim().toLowerCase();

                        const show=selected==='all'||brand===selected;

                        card.classList.toggle('bb-brand-hidden',!show);

                        if(show) visible++;

                    });

                    if(count){

                        count.textContent=

                            visible+(visible===1?' Product':' Products');

                    }

                    if(empty){

                        empty.style.display=visible===0?'block':'none';

                    }

                    if(selectedBox&&selectedName){

                        if(selected==='all'){

                            selectedBox.classList.remove('show');

                            selectedName.textContent='';

                        }else{

                            selectedName.textContent=label||value;

                            selectedBox.classList.add('show');

                        }

                    }

                    if(window.innerWidth<=900&&filterSidebar){

                        filterSidebar.classList.remove('open');

                        const icon=filterButton?.querySelector('span:last-child');

                        if(icon) icon.textContent='+';

                    }

                });

                document.querySelectorAll('.bb-add-cart').forEach(function(button){

                    button.addEventListener('click',function(){

                        const url=button.dataset.url;

                        if(!url) return;

                        button.disabled=true;

                        fetch(url,{

                            method:'POST',

                            headers:{

                                'X-CSRF-TOKEN':'{{ csrf_token() }}',

                                'Accept':'application/json',

                                'Content-Type':'application/json'

                            },

                            credentials:'same-origin',

                            body:JSON.stringify({})

                        })

                        .then(async function(response){

                            let data={};

                            try{

                                data=await response.json();

                            }catch(e){}

                            if(

                                response.status===401||

                                data.message==='Unauthenticated.'

                            ){

                                document

                                    .querySelector('.popup_login_link')

                                    ?.click();

                                throw new Error('Unauthenticated');

                            }

                            if(!response.ok){

                                throw new Error(

                                    data.message||

                                    'Unable to add product to cart.'

                                );

                            }

                            window.location.reload();

                        })

                        .catch(function(error){

                            button.disabled=false;

                            if(error.message!=='Unauthenticated.'){

                                alert(error.message);

                            }

                        });

                    });

                });

            });

        </script>

    </x-slot>

</x-guest-layout>