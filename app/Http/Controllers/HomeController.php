<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::query()->get();
        $posts = Post::query()->get();

        return view('client.index', compact('category', 'posts'));
    }
    // public function luotxem(){
    //     $luotxem = Post::query()
    //     ->orderBy('view', 'desc')
    //     ->get();
    //     return view('client.index', compact('posts'));
    // }
//     public function danhsachbaiviet(){
//     //     $posts = Post::query()->get();

//     //     return view('client.index', compact('posts'));
//     // }
}
