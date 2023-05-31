<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::all();
        if ($categoryId = $request->get('category_id')) {
            $posts = $posts->where('category_id', $categoryId);
        }
        if ($user_id = $request->get('user_id')) {
            $posts = $posts->where('user_id', $user_id);
        }

        $categories = Category::all();
        $users = User::all();

        return view('admin.post.index', [
            'posts' => $posts,
            'categories' => $categories,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.post.create', ['categories' => $categories, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        $data = $request->all();
        $post = Post::query()->create($data);
        return redirect()->route('admin.posts.index')->with('message', 'Статья с ID ' . $post->id . ' записана в БД');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.post.edit', [
            'post' => $post,
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);
        return redirect()->route('admin.posts.index')->with('message', 'Пост обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('message', 'Пост удалён');
    }

    public function drop()
    {
        Post::query()->delete();
        return redirect()->back()->with('message', 'все посты удалены');
    }

    public function trashcan()
    {
        $data = Post::onlyTrashed()->get();
        return view('admin.post.trashcan', ['posts' => $data]);
    }

    public function restore(int $id)
    {
        Post::withTrashed()->firstWhere('id', $id)->restore();
        return redirect()->back()->with('message', 'Пост восстановлен');
    }
}
