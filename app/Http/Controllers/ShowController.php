<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(string $id)
    {

        $post = Post::query()->findOrFail($id);
        $post->increment('view');

        return view('client.show', compact('post'));
    }
    public function danhmuc(string $id)
    {

        $categoryID = Category::query()->findOrFail($id);
        $posts = Post::query()->where('category_id', $id)->paginate(5);
        return view('client.danhmuc', compact('categoryID', 'posts'));
    }
    public function tag(string $id)
    {
        $tagID = Tag::query()->findOrFail($id);
        // dd($tagID);
        // Lấy tag và bài viết liên quan
        $tags = Tag::query()->with('posts')->where('id', $id)->first();
        // dd($tags->posts());

        return view('client.tag', compact('tagID', 'tags'));
    }
}
