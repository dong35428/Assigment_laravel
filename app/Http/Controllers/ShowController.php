<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(string $id)
    {
        $category = Category::query()->get();
        $post = Post::query()->findOrFail($id);
        return view('client.show', compact('category', 'post'));
    }
    public function danhmuc(string $id){
        $category = Category::query()->get();
        $categoryID = Category::query()->findOrFail($id);
        $posts = Post::query()->where('category_id', $id)->paginate();
        return view('client.danhmuc', compact('category','categoryID', 'posts'));
    }
}
