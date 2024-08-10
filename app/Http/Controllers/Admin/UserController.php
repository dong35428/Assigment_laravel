<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, string $id)
    {
        $user = User::find($id);


        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'Cập nhật thành công');
    }
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'Xóa thành công');
    }
}
