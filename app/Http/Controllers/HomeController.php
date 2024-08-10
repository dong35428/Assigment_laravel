<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $posts = Post::query()->with('tags')->latest('id')->paginate(10);

        $postLimit = Post::query()->latest('id')->paginate(3);

        $users = User::query()->where('type', 'admin')->get();

        $tags = Tag::query()->latest('id')->get();
        //nhiều lượt xem
        $view = Post::query()->orderBy('view', 'desc')->first();
        //nổi bật
        $hotPosts =  Post::query()->orderBy('view', 'desc')->limit(3)->get();
        //bài viết phổ biến
        $popular = Post::query()->where('view','>','10')->inRandomOrder()->first();
        // dd($posts);
        return view('client.index', compact(
            'posts',
            'tags',
            'postLimit',
            'users',
            'view',
            'hotPosts',
            'popular'
        ));
    }
}
