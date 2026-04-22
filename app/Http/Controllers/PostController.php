<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class PostController extends Controller
{
    public function index(Request $request): Factory|View
    {
//        $tags = Tag::all()->find(4);
//        dd($tags->posts);
//        $post = Post::all()->find(5)->tags;
//        dd($post);
//        $categories = Category::all()->find(1);
//        dd($categories->posts);
//        $posts = Post::where('title', 'like', '%title%')->limit(10)->get();
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create(Request $request): Factory|View
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:80',
            'content' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|string|url:http,https',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        /*foreach ($tags as $tag) {
            PostTag::firstOrCreate([
                'post_id' => $post->id,
                'tag_id' => $tag
            ]);
        }*/
        $post->tags()->attach($tags);

        return redirect(route('post.index'));
    }

    public function show(Post $post): Factory|View
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:80',
            'content' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|url:http,https',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect(route('post.show', $post));
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect(route('post.index'));
    }
}
