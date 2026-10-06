<?php

namespace App\Support;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Str;

class SeoMeta
{
    public const DEFAULT_IMAGE = 'BUFF_LOGO.png';

    public static function defaults(array $seo = []): array
    {
        $siteName = 'Buffbridge';
        $canonical = $seo['canonical'] ?? url()->current();
        $title = $seo['title'] ?? config('app.name', $siteName);
        $description = $seo['description'] ?? 'Buffbridge BB Gun Store';
        $image = $seo['image'] ?? asset(self::DEFAULT_IMAGE);

        if (! isset($seo['robots']) && self::requestShouldBeNoindex()) {
            $seo['robots'] = 'noindex,follow';
        }

        $resolved = array_merge([
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'robots' => 'index,follow',
            'ogTitle' => $title,
            'ogDescription' => $description,
            'ogImage' => $image,
            'ogUrl' => $canonical,
            'ogType' => 'website',
            'twitterCard' => 'summary_large_image',
            'twitterTitle' => $title,
            'twitterDescription' => $description,
            'twitterImage' => $image,
            'schemas' => [],
        ], $seo);

        if ($resolved['schemas'] === []) {
            $resolved = self::withGlobalSchemas($resolved);
        }

        return $resolved;
    }

    public static function home(): array
    {
        $title = 'Buffbridge | ร้านบีบีกัน BB Gun & Airsoft Gun อุปกรณ์ครบวงจร';
        $description = 'Buffbridge ร้านบีบีกันที่รวม BB Gun และ Airsoft Gun ทั้ง GBB, GBBR ปืนสั้น ปืนยาว พร้อมอะไหล่ ของแต่ง และอุปกรณ์ Airsoft สำหรับผู้เล่นทุกระดับ';
        $canonical = route('home');

        return self::withGlobalSchemas([
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'robots' => 'index,follow',
            'ogTitle' => $title,
            'ogDescription' => $description,
            'ogUrl' => $canonical,
        ]);
    }

    public static function products(?Category $category = null): array
    {
        $page = max(1, (int) request('page', 1));
        $canonicalParameters = [];

        if ($category) {
            $canonicalParameters['category'] = $category->id;
        }

        if ($page > 1) {
            $canonicalParameters['page'] = $page;
        }

        $canonical = route('products.index', $canonicalParameters);
        $hasNonSeoParameters = collect([
            'search',
            'orderby',
            'availability',
            'min_price',
            'max_price',
            'brand',
            'restock',
        ])->contains(fn (string $key) => request()->filled($key));

        if (! $category) {
            $title = 'BB Gun & Airsoft Gun ปืนบีบีกันและอุปกรณ์ | Buffbridge';
            $description = 'เลือกชม BB Gun และ Airsoft Gun พร้อมปืนสั้น ปืนยาว อะไหล่ ของแต่ง แม็กกาซีน และอุปกรณ์สำหรับผู้เล่น Airsoft จาก Buffbridge';
            $h1Primary = 'BB Gun & Airsoft Gun';
            $h1Secondary = '';
        } else {
            [$title, $description, $h1Primary, $h1Secondary] = self::categoryContent($category);
        }

        return self::withGlobalSchemas([
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'robots' => $hasNonSeoParameters ? 'noindex,follow' : 'index,follow',
            'ogTitle' => $title,
            'ogDescription' => $description,
            'ogUrl' => $canonical,
            'h1Primary' => $h1Primary,
            'h1Secondary' => $h1Secondary,
        ]);
    }

    public static function product(Product $product): array
    {
        $canonical = route('products.show', $product);
        $type = self::productType($product);
        $title = self::productTitle($product, $type);
        $description = self::productDescription($product, $type);
        $productImage = self::productImage($product);
        $image = $productImage ?? asset(self::DEFAULT_IMAGE);
        $price = $product->variants->pluck('price')->filter()->map(fn ($price) => (float) $price)->min()
            ?? (float) $product->price;

        $offerSchema = array_filter([
            '@type' => 'Offer',
            'url' => $canonical,
            'priceCurrency' => 'THB',
            'price' => $price > 0 ? number_format($price, 2, '.', '') : null,
            'availability' => self::schemaAvailability($product->availability),
        ], fn ($value) => $value !== null && $value !== '');

        $productSchema = array_filter([
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->name,
            'image' => $productImage ? [$productImage] : null,
            'description' => $description,
            'sku' => $product->product_code ?: null,
            'brand' => $product->brand ? [
                '@type' => 'Brand',
                'name' => $product->brand,
            ] : null,
            'offers' => $price > 0 ? $offerSchema : null,
        ], fn ($value) => $value !== null && $value !== '');

        $breadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => route('home'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Products',
                    'item' => route('products.index'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => $product->name,
                    'item' => $canonical,
                ],
            ],
        ];

        return self::withGlobalSchemas([
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'robots' => 'index,follow',
            'ogTitle' => $title,
            'ogDescription' => $description,
            'ogImage' => $image,
            'ogUrl' => $canonical,
            'ogType' => 'product',
            'twitterTitle' => $title,
            'twitterDescription' => $description,
            'twitterImage' => $image,
            'schemas' => [$productSchema, $breadcrumbSchema],
        ]);
    }

    public static function blogIndex(bool $isSearch = false): array
    {
        $title = 'บทความ BB Gun & Airsoft เทคนิคและคู่มือ | Buffbridge';
        $description = 'รวมบทความและคู่มือ BB Gun และ Airsoft ทั้งการเลือกสินค้า การใช้งาน การดูแลอุปกรณ์ และข้อมูลสำหรับผู้เล่นจาก Buffbridge';
        $canonicalParameters = [];
        $page = max(1, (int) request('page', 1));

        if (! $isSearch && $page > 1) {
            $canonicalParameters['page'] = $page;
        }

        $canonical = route('posts.index', $canonicalParameters);

        return self::withGlobalSchemas([
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'robots' => $isSearch ? 'noindex,follow' : 'index,follow',
            'ogTitle' => $title,
            'ogDescription' => $description,
            'ogUrl' => $canonical,
        ]);
    }

    public static function blogCategory(PostCategory $category, bool $hasContent): array
    {
        $title = "{$category->name} | บทความ Airsoft & BB Gun | Buffbridge";
        $description = "รวมบทความ {$category->name} พร้อมข้อมูลและคู่มือ Airsoft และ BB Gun จากเนื้อหาที่เผยแพร่จริงโดย Buffbridge";

        return self::blogTaxonomy(
            $title,
            $description,
            route('posts.category', self::taxonomyParameters($category->slug)),
            $hasContent
        );
    }

    public static function blogTag(Tag $tag, bool $hasContent): array
    {
        $title = "{$tag->name} | บทความและข้อมูล Airsoft | Buffbridge";
        $description = "อ่านบทความที่เกี่ยวข้องกับ {$tag->name} พร้อมข้อมูลและคู่มือ Airsoft จากเนื้อหาที่เผยแพร่จริงโดย Buffbridge";

        return self::blogTaxonomy(
            $title,
            $description,
            route('posts.tag', self::taxonomyParameters($tag->slug)),
            $hasContent
        );
    }

    public static function blogPost(Post $post): array
    {
        $canonical = route('posts.show', $post->slug);
        $title = self::containsTerm($post->title, 'Buffbridge')
            ? $post->title
            : "{$post->title} | Buffbridge";
        $description = self::postDescription($post);
        $featuredImage = $post->featured_image_url;
        $socialImage = $featuredImage ?: asset(self::DEFAULT_IMAGE);

        $articleSchema = array_filter([
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $post->title,
            'description' => $description,
            'image' => $featuredImage ? [$featuredImage] : null,
            'datePublished' => $post->published_at?->toAtomString(),
            'dateModified' => $post->updated_at?->toAtomString(),
            'author' => $post->user?->name ? [
                '@type' => 'Person',
                'name' => $post->user->name,
            ] : null,
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Buffbridge',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset(self::DEFAULT_IMAGE),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $canonical,
            ],
            'url' => $canonical,
        ], fn ($value) => $value !== null && $value !== '');

        $breadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => route('home'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Blog',
                    'item' => route('posts.index'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => $post->title,
                    'item' => $canonical,
                ],
            ],
        ];

        return self::withGlobalSchemas([
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'robots' => 'index,follow',
            'ogTitle' => $title,
            'ogDescription' => $description,
            'ogImage' => $socialImage,
            'ogUrl' => $canonical,
            'ogType' => 'article',
            'twitterTitle' => $title,
            'twitterDescription' => $description,
            'twitterImage' => $socialImage,
            'schemas' => [$articleSchema, $breadcrumbSchema],
        ]);
    }

    public static function withGlobalSchemas(array $seo): array
    {
        $schemas = $seo['schemas'] ?? [];
        $homeUrl = route('home');

        $seo['schemas'] = array_merge([
            [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => 'Buffbridge',
                'url' => $homeUrl,
                'logo' => asset(self::DEFAULT_IMAGE),
            ],
            [
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => 'Buffbridge',
                'url' => $homeUrl,
            ],
        ], $schemas);

        return $seo;
    }

    private static function categoryContent(Category $category): array
    {
        return match (self::normalize($category->name)) {
            'gas blowback rifles' => [
                'ปืนยาวอัดแก๊ส GBB / GBBR Airsoft Rifle | Buffbridge',
                'เลือกชมปืนยาวอัดแก๊ส Gas Blowback Rifles, GBBR และ Airsoft Rifle จากสินค้าจริงในหมวด พร้อมรุ่นและแบรนด์ที่ Buffbridge คัดสรร',
                'ปืนยาวอัดแก๊ส GBB / GBBR',
                '',
            ],
            'gas blowback pistols' => [
                'ปืนสั้นอัดแก๊ส GBB / Airsoft Pistol | Buffbridge',
                'เลือกชมปืนสั้นอัดแก๊ส GBB และ Airsoft Pistol จากสินค้าจริงในหมวด พร้อมรุ่นและแบรนด์หลากหลายสำหรับผู้เล่น Airsoft',
                'ปืนสั้นอัดแก๊ส GBB / Airsoft Pistol',
                '',
            ],
            'parts' => [
                'อะไหล่บีบีกัน อะไหล่ Airsoft GBB / GBBR | Buffbridge',
                'รวมอะไหล่บีบีกันและอะไหล่ Airsoft สำหรับปืนสั้น ปืนยาว ระบบ GBB และ GBBR เลือกชิ้นส่วนจากสินค้าจริงที่ Buffbridge',
                'อะไหล่บีบีกัน / อะไหล่ Airsoft',
                '',
            ],
            '#mws', 'mws' => [
                'Tokyo Marui MWS อะไหล่และของแต่ง MWS | Buffbridge',
                'เลือกชมสินค้า Tokyo Marui MWS พร้อมอะไหล่ MWS และของแต่ง MWS จากรายการสินค้าจริงในหมวดสำหรับการดูแลและปรับแต่ง',
                'Tokyo Marui MWS / อะไหล่และของแต่ง MWS',
                '',
            ],
            default => [
                "{$category->name} | Airsoft & BB Gun | Buffbridge",
                "เลือกชมสินค้า {$category->name} สำหรับ Airsoft และ BB Gun จากรายการสินค้าจริงของ Buffbridge พร้อมข้อมูลราคาและสถานะสินค้า",
                $category->name,
                '',
            ],
        };
    }

    private static function productTitle(Product $product, string $type): string
    {
        $name = trim((string) $product->name);
        $brand = trim((string) $product->brand);
        $parts = [];
        $typeWasAppended = false;

        if ($brand !== '' && ! self::nameContainsBrand($name, $brand)) {
            $parts[] = $brand;
        }

        $parts[] = $name;

        if ($type !== '' && ! self::containsTerm(implode(' ', $parts), $type)) {
            $parts[] = $type;
            $typeWasAppended = true;
        }

        $base = trim(implode(' ', array_filter($parts)));
        $suffix = ' | Buffbridge';

        if (mb_strlen($base.$suffix) > 60 && $typeWasAppended) {
            array_pop($parts);
            $base = trim(implode(' ', array_filter($parts)));
        }

        return $base.$suffix;
    }

    private static function productDescription(Product $product, string $type): string
    {
        $description = trim(preg_replace('/\s+/u', ' ', strip_tags((string) $product->description)) ?? '');

        if ($description !== '') {
            return Str::limit($description, 155, '…');
        }

        $facts = array_filter([
            $product->brand,
            $product->name,
            $type,
            $product->product_code ? "รหัสสินค้า {$product->product_code}" : null,
        ]);

        return Str::limit('เลือกชม '.implode(' ', array_unique($facts)).' พร้อมราคาและสถานะสินค้าจริงจาก Buffbridge', 155, '…');
    }

    private static function postDescription(Post $post): string
    {
        $source = trim((string) ($post->excerpt ?: $post->content));
        $description = trim(preg_replace('/\s+/u', ' ', strip_tags($source)) ?? '');

        return Str::limit($description, 155, '…');
    }

    private static function blogTaxonomy(
        string $title,
        string $description,
        string $canonical,
        bool $hasContent
    ): array {
        return self::withGlobalSchemas([
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'robots' => $hasContent ? 'index,follow' : 'noindex,follow',
            'ogTitle' => $title,
            'ogDescription' => $description,
            'ogUrl' => $canonical,
        ]);
    }

    private static function taxonomyParameters(string $slug): array
    {
        $parameters = [$slug];
        $page = max(1, (int) request('page', 1));

        if ($page > 1) {
            $parameters['page'] = $page;
        }

        return $parameters;
    }

    private static function productType(Product $product): string
    {
        $categoryNames = collect([$product->category?->name, $product->category2?->name])
            ->filter()
            ->map(fn (string $name) => self::normalize($name));

        if ($categoryNames->contains(fn (string $name) => $name === '#mws' || $name === 'mws')) {
            return 'MWS';
        }

        if ($categoryNames->contains(fn (string $name) => str_contains($name, 'gas blowback rifles'))) {
            return 'GBBR';
        }

        if ($categoryNames->contains(fn (string $name) => str_contains($name, 'gas blowback pistols'))) {
            return 'GBB';
        }

        return '';
    }

    private static function productImage(Product $product): ?string
    {
        $path = $product->images->first()?->image_path;

        if (! $path) {
            return null;
        }

        $adminUrl = rtrim((string) config('app.admin_url'), '/');

        return $adminUrl !== ''
            ? $adminUrl.'/storage/'.ltrim($path, '/')
            : asset('storage/'.ltrim($path, '/'));
    }

    private static function schemaAvailability(?string $availability): ?string
    {
        return match (self::normalize((string) $availability)) {
            'in stock', 'instock' => 'https://schema.org/InStock',
            'pre-order', 'preorder' => 'https://schema.org/PreOrder',
            'out of stock', 'outofstock' => 'https://schema.org/OutOfStock',
            default => null,
        };
    }

    private static function requestShouldBeNoindex(): bool
    {
        return request()->routeIs([
            'login',
            'register',
            'password.*',
            'verification.*',
            'profile.*',
            'cart.*',
            'checkout.*',
            'order.*',
            'products.live-search',
        ]) || request()->filled('search');
    }

    private static function containsTerm(string $haystack, string $needle): bool
    {
        return str_contains(self::normalize($haystack), self::normalize($needle));
    }

    private static function nameContainsBrand(string $name, string $brand): bool
    {
        if (self::containsTerm($name, $brand)) {
            return true;
        }

        $tokens = preg_split('/[^\p{L}\p{N}]+/u', self::normalize($brand), -1, PREG_SPLIT_NO_EMPTY) ?: [];

        return collect($tokens)
            ->filter(fn (string $token) => mb_strlen($token) >= 2)
            ->contains(fn (string $token) => self::containsTerm($name, $token));
    }

    private static function normalize(string $value): string
    {
        return mb_strtolower(trim(preg_replace('/\s+/u', ' ', $value) ?? $value));
    }
}
