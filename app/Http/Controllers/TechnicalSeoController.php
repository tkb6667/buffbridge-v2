<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\Tag;
use DOMDocument;
use Illuminate\Http\Response;

class TechnicalSeoController extends Controller
{
    public function sitemap(): Response
    {
        $urls = collect([
            ['loc' => route('home')],
            ['loc' => route('products.index')],
            ['loc' => route('posts.index')],
            ['loc' => route('contact')],
            ['loc' => route('appointments.create')],
            ['loc' => route('privacy')],
            ['loc' => route('term')],
        ]);

        Category::query()
            ->whereIn('name', ['Gas Blowback Rifles', 'Gas Blowback Pistols', 'Parts', '#MWS'])
            ->where('active', 1)
            ->get(['id', 'updated_at'])
            ->each(fn (Category $category) => $urls->push([
                'loc' => route('products.index', ['category' => $category->id]),
                'lastmod' => $category->updated_at,
            ]));

        Product::query()
            ->where('active', 1)
            ->orderBy('id')
            ->get(['id', 'updated_at'])
            ->each(fn (Product $product) => $urls->push([
                'loc' => route('products.show', $product),
                'lastmod' => $product->updated_at,
            ]));

        Post::query()
            ->where('status', 'Published')
            ->where('published_at', '<=', now())
            ->orderBy('id')
            ->get(['id', 'slug', 'updated_at'])
            ->each(fn (Post $post) => $urls->push([
                'loc' => route('posts.show', $post->slug),
                'lastmod' => $post->updated_at,
            ]));

        PostCategory::query()
            ->whereHas('posts', fn ($query) => $query
                ->where('status', 'Published')
                ->where('published_at', '<=', now()))
            ->orderBy('id')
            ->get(['id', 'slug', 'updated_at'])
            ->each(fn (PostCategory $category) => $urls->push([
                'loc' => route('posts.category', $category->slug),
                'lastmod' => $category->updated_at,
            ]));

        Tag::query()
            ->whereHas('posts', fn ($query) => $query
                ->where('status', 'Published')
                ->where('published_at', '<=', now()))
            ->orderBy('id')
            ->get(['id', 'slug', 'updated_at'])
            ->each(fn (Tag $tag) => $urls->push([
                'loc' => route('posts.tag', $tag->slug),
                'lastmod' => $tag->updated_at,
            ]));

        $document = new DOMDocument('1.0', 'UTF-8');
        $document->formatOutput = true;
        $urlset = $document->createElementNS('http://www.sitemaps.org/schemas/sitemap/0.9', 'urlset');
        $document->appendChild($urlset);

        foreach ($urls->unique('loc')->values() as $url) {
            $urlNode = $document->createElement('url');
            $urlNode->appendChild($document->createElement('loc'))
                ->appendChild($document->createTextNode($url['loc']));

            if (! empty($url['lastmod'])) {
                $urlNode->appendChild($document->createElement('lastmod', $url['lastmod']->toAtomString()));
            }

            $urlset->appendChild($urlNode);
        }

        return response($document->saveXML(), 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }

    public function robots(): Response
    {
        $content = implode("\n", [
            'User-agent: *',
            'Disallow:',
            'Sitemap: '.route('sitemap'),
            '',
        ]);

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
        ]);
    }
}
