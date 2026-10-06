<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Tag;
use App\Support\SeoMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of posts (Blog Index, Category Archive, Tag Archive).
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Start the query for published posts
        $query = Post::query()->where('status', 'Published')->where('published_at', '<=', now());

        $pageTitle = 'All Articles'; // Default title

        // 1. Handle search functionality
        if ($request->has('search') && $request->input('search') != '') {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('content', 'like', "%{$searchTerm}%");
            });
            $pageTitle = 'Search Results for: ' . $searchTerm;
        }

        // Paginate the results
        $posts = $query->with('user', 'postCategories')
            ->latest('published_at')
            ->paginate(10); // 10 posts per page

        // 2. Get data for the sidebar
        $sidebarData = $this->getSidebarData();
        $seo = SeoMeta::blogIndex($request->filled('search'));

        // 3. Pass all data to the view
        return view('blogs.index', [
            'posts' => $posts,
            'categories' => $sidebarData['categories'],
            'recentPosts' => $sidebarData['recentPosts'],
            'popularPosts' => $sidebarData['popularPosts'], // Pass popular posts to the view
            'pageTitle' => $pageTitle,
            'seo' => $seo,
        ]);
    }

    public function liveSearch(Request $request)
    {
        $validated = $request->validate(['q' => ['nullable', 'string', 'max:100']]);
        $keyword = trim((string) ($validated['q'] ?? ''));
        $respond = fn ($articles = [], bool $hasMore = false) => response()->json([
            'articles' => $articles,
            'has_more' => $hasMore,
        ])->header('X-Robots-Tag', 'noindex, nofollow');

        if (mb_strlen($keyword) < 2) {
            return $respond();
        }

        $posts = Post::query()
            ->select(['id', 'title', 'slug', 'excerpt', 'content', 'featured_image', 'published_at'])
            ->where('status', 'Published')
            ->where('published_at', '<=', now())
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                    ->orWhere('excerpt', 'like', "%{$keyword}%")
                    ->orWhere('content', 'like', "%{$keyword}%");
            })
            ->orderByRaw('CASE WHEN title LIKE ? THEN 0 ELSE 1 END', ["{$keyword}%"])
            ->latest('published_at')
            ->limit(7)
            ->get();

        $articles = $posts->take(6)->map(fn (Post $post) => [
            'title' => $post->title,
            'excerpt' => Str::limit(trim(strip_tags((string) ($post->excerpt ?: $post->content))), 90),
            'date' => $post->published_at?->format('d M Y'),
            'image' => $post->featured_image_url,
            'url' => route('posts.show', $post->slug),
        ])->values();

        return $respond($articles, $posts->count() > 6);
    }

    /**
     * Display a single post.
     *
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        // 1. Increment the view count for the post. (Requires 'views' column on 'posts' table)
        $post->increment('views');
        $post->loadMissing(['user:id,name', 'postCategories:id,name,slug', 'tags:id,name,slug']);

        // 2. Find related posts from the same category
        //    *FIXED: Explicitly reference 'posts.id' and 'post_categories.id' to avoid ambiguity.*
        $relatedPosts = Post::query()
            ->where('status', 'Published')
            // **✅ แก้ไข:** ระบุชัดเจนว่าเป็น posts.id เพื่อป้องกันความกำกวมใน Subquery
            ->where('posts.id', '!=', $post->id)
            ->whereHas('postCategories', function ($query) use ($post) {
                // **✅ แก้ไข:** ระบุชัดเจนว่าเป็น post_categories.id
                $query->whereIn('post_categories.id', $post->postCategories->pluck('id'));
            })
            ->latest('published_at')
            ->take(4) // Get 4 related posts
            ->get();

        $seo = SeoMeta::blogPost($post);

        return view('blogs.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'seo' => $seo,
        ]);
    }

    /**
     * Display posts by a specific category.
     *
     * @param PostCategory $postCategory
     * @return \Illuminate\View\View
     */
    public function showByCategory(PostCategory $postCategory)
    {
        $posts = $postCategory->posts()
            ->where('status', 'Published')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(10);

        $sidebarData = $this->getSidebarData();
        $seo = SeoMeta::blogCategory($postCategory, $posts->total() > 0);

        return view('blogs.index', [
            'posts' => $posts,
            'categories' => $sidebarData['categories'],
            'recentPosts' => $sidebarData['recentPosts'],
            'popularPosts' => $sidebarData['popularPosts'], // Pass popular posts to the view
            'pageTitle' => 'Category: ' . $postCategory->name,
            'seo' => $seo,
        ]);
    }

    /**
     * Display posts by a specific tag.
     *
     * @param Tag $tag
     * @return \Illuminate\View\View
     */
    public function showByTag(Tag $tag)
    {
        $posts = $tag->posts()
            ->where('status', 'Published')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(10);

        $sidebarData = $this->getSidebarData();
        $seo = SeoMeta::blogTag($tag, $posts->total() > 0);

        return view('blogs.index', [
            'posts' => $posts,
            'categories' => $sidebarData['categories'],
            'recentPosts' => $sidebarData['recentPosts'],
            'popularPosts' => $sidebarData['popularPosts'], // Pass popular posts to the view
            'pageTitle' => 'Tag: ' . $tag->name,
            'seo' => $seo,
        ]);
    }

    /**
     * Helper function to get common data for the sidebar.
     *
     * @return array
     */
    private function getSidebarData()
    {
        // Get categories that have at least one published post, and count them
        $categories = PostCategory::whereHas('posts', function ($query) {
            $query->where('status', 'Published')->where('published_at', '<=', now());
        })->withCount(['posts' => function ($query) {
            $query->where('status', 'Published')->where('published_at', '<=', now());
        }])->get();

        // Get the 5 most recent published posts
        $recentPosts = Post::where('status', 'Published')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(5)
            ->get();

        // Get the 5 most popular posts (assuming a 'views' column exists)
        $popularPosts = Post::where('status', 'Published')
            ->where('published_at', '<=', now())
            ->orderByDesc('views') // Order by the 'views' column
            ->take(5)
            ->get();

        return [
            'categories' => $categories,
            'recentPosts' => $recentPosts,
            'popularPosts' => $popularPosts,
        ];
    }
}
