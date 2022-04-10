<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = app(Category::class);
        return view('admin.categories.index', ['categories' => $category->getCategories()]);
    }

    public function edit(Request $request)
    {
        $news = app(Category::class);
        return view('admin.categories.edit', ['category' => $news->getCategoryById($request->get('category'))]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        dd($_REQUEST);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        dd($_REQUEST);
    }
}
