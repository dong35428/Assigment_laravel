<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::query()->get();
        return view('admin.tags.index', compact('tags'));
    }
    public function create()
    {
        return view('admin.tags.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);
        Tag::create($request->all());
        return redirect()->route('admin.tags.index')->with('success', 'Thêm mới thành công');
    }
    public function edit(string $id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }
    public function update(Request $request, string $id)
    {
        $tag = Tag::find($id);

        $tag->update($request->all());
        return redirect()->route('admin.tags.index')->with('success', 'Cập nhật thành công');
    }
    public function destroy(string $id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Xóa thành công');
    }
}
