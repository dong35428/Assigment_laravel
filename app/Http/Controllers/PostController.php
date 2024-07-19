<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function seach(request $request)
    {

        $category = Category::query()->select('id', 'name')->get();

        $categoriesID = $request->input('category_id');


        $keyword = $request->input('keyword');

        if ($keyword && !$categoriesID) {
            $posts = Post::query()->where('title', 'LIKE', "%{$keyword}%")->get();
        }
        if (!$keyword && $categoriesID) {
            $posts = Post::query()->where('category_id', $categoriesID)->get();
        }
        // if ($keyword && $categoriesID) {
        //     $posts = Post::query()->where('title', 'LIKE', "%{$keyword}%")
        //         ->where('category_id', $categoriesID)
        //         ->get();
        // }



        return view('admin.posts.seach', compact('posts', 'category'));
    }

    public function index()
    {
        $category = Category::query()->select('id', 'name')->get();
        $posts = Post::query()->with('category', 'user')->latest()->paginate();
        return view('admin.posts.index', compact('posts', 'category'));
    }
    public function show(string $id)
    {
        $post = Post::query()->find($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $category = Category::query()->select('id', 'name')->get();

        return view('admin.posts.create', compact('category')); // chuyển đến trang thêm
    }
    public function store(Request $request)
    {

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = Storage::putFile('posts', $request->file('image'));
            $data['image'] = 'storage/' . $path; // lưu ảnh vào thư mục posts của storage

        }
        Post::create($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Thêm bài viết thành công');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $category = Category::query()->pluck('name', 'id')->all();
        return view('admin.posts.edit', compact('post', 'category'));
    }

    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = Storage::putFile('posts', $request->file('image'));
            $data['image'] = 'storage/' . $path; // lưu ảnh vào thư mục posts của storage

        }
        $currentImgTHumb = $post->image;


        $post->update($data);
        if ($request->hasFile('image') && $currentImgTHumb && file_exists(public_path($currentImgTHumb))) {
            unlink(public_path($currentImgTHumb));
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Post::find($id);
        $data->delete();
        if ($data->image && file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }
        return redirect()->route('admin.posts.index')
            ->with('success', 'Xóa bài viết thành công');
    }
}
