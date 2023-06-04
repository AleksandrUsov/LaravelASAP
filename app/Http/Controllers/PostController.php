<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request): View
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);

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
    public function create(): View
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.post.create', ['categories' => $categories, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $data = $request->all();
        $post = Post::query()->create($data);
        return redirect()->route('admin.posts.index')->with('message', 'Статья с ID ' . $post->id . ' записана в БД');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
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
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->all();
        $post->update($data);
        return redirect()->route('admin.posts.index')->with('message', 'Пост обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->back()->with('message', 'Пост удалён');
    }

    public function drop(): RedirectResponse
    {
        Post::query()->delete();
        return redirect()->back()->with('message', 'все посты удалены');
    }

    public function trashcan(): View
    {
        $data = Post::onlyTrashed()->get();
        return view('admin.post.trashcan', ['posts' => $data]);
    }

    public function restore(int $id): RedirectResponse
    {
        Post::withTrashed()->firstWhere('id', $id)->restore();
        return redirect()->back()->with('message', 'Пост восстановлен');
    }

    public function restoreAll(): RedirectResponse
    {
        Post::onlyTrashed()->restore();
        return redirect()->back()->with('message', 'Все посты восстановлены');
    }
}
