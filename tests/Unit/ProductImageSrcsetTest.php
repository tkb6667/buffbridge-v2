<?php

namespace Tests\Unit;

use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductImageSrcsetTest extends TestCase
{
    public function test_it_exposes_only_existing_responsive_variants(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('product_images/example.jpg', 'original');
        Storage::disk('public')->put('product_images/example-480w.webp', 'small');
        Storage::disk('public')->put(
            'product_images/example-variants.json',
            json_encode(['widths' => [480]])
        );

        $image = new ProductImage(['image_path' => 'product_images/example.jpg']);

        $this->assertSame('/storage/product_images/example.jpg', $image->url);
        $this->assertSame(
            '/storage/product_images/example-480w.webp 480w',
            $image->srcset
        );
    }
}
