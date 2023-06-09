<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::all();
        return view(
            'admin.category.index',
            ['categories' => $categories]
        );
    }

    /**
     * Show the post for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        Category::query()->create($data);
        return redirect()->route('admin.categories.index')->with('message', 'Категория создана');
    }

    /**
     * Show the post for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('message', 'Категория изменена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->back()->with('message', 'Категория удалена');
    }
}
