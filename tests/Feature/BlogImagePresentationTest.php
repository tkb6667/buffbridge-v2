<?php

namespace Tests\Feature;

use App\Http\Middleware\ComingSoon;
use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BlogImagePresentationTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(ComingSoon::class);
    }

    public function test_listing_uses_saved_crop_and_legacy_post_uses_fallback(): void
    {
        $cropped = Post::create([
            'title' => 'Cropped listing image',
            'slug' => 'cropped-listing-image',
            'content' => '<p>Article</p>',
            'featured_image' => '/storage/posts/featured/cropped.webp',
            'featured_image_crop_x' => 25,
            'featured_image_crop_y' => 70,
            'featured_image_crop_zoom' => 1.5,
            'status' => 'Published',
            'published_at' => now(),
        ]);

        Post::create([
            'title' => 'Legacy listing image',
            'slug' => 'legacy-listing-image',
            'content' => '<p>Legacy</p>',
            'featured_image' => '/storage/posts/featured/legacy.webp',
            'status' => 'Published',
            'published_at' => now()->subMinute(),
        ]);

        $response = $this->get(route('posts.index'))->assertOk();
        $response
            ->assertSee('data-featured-thumbnail', false)
            ->assertSee('data-crop-x="25.00"', false)
            ->assertSee('data-crop-y="70.00"', false)
            ->assertSee('data-crop-zoom="1.50"', false)
            ->assertSee('js/blog-thumbnail-crop.js', false);

        $legacy = Post::where('slug', 'legacy-listing-image')->firstOrFail();
        $this->assertNull($legacy->featured_image_crop_x);
        $this->assertNull($legacy->featured_image_crop_y);
        $this->assertNull($legacy->featured_image_crop_zoom);
    }

    public function test_detail_limits_images_without_narrowing_article_text(): void
    {
        $post = Post::create([
            'title' => 'Detail image sizing',
            'slug' => 'detail-image-sizing',
            'content' => '<p>Wide text remains wide.</p><img src="/storage/posts/content/test.webp" width="320">',
            'featured_image' => '/storage/posts/featured/detail.webp',
            'status' => 'Published',
            'published_at' => now(),
        ]);

        $this->get(route('posts.show', $post->slug))
            ->assertOk()
            ->assertSee('width: min(820px, 100%);', false)
            ->assertSee('max-width: min(720px, 100%) !important;', false)
            ->assertSee('height: auto !important;', false)
            ->assertSee('width="320"', false);
    }
}
