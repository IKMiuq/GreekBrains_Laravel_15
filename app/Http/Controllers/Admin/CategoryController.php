<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', ['categories' => Category::active()->withCount('news')->paginate(5)]);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);
        if ($category->fill($request->only('title', 'description'))->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);
        $data = $request->only(['title', 'description']);
        $category = Category::create($data);
        if ($category) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer']
        ]);
        $category = Category::destroy($request->get('id'));
        if ($category) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно удалена');
        }
        return back()->with('error', 'Не удалось');
    }
}
