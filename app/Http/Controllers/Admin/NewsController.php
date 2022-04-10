<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', ['news' => News::with('category')->paginate(5)]);
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', ['news' => $news]);
    }

    public function create()
    {
        return view('admin.news.create', ['categories' => Category::select('id', 'title')->get()]);
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);
        if ($news->fill($request->only('title', 'description','category_id', 'status', 'author', 'image'))->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);
        $data = $request->only(['title', 'description','category_id', 'status', 'author', 'image']);
        $news = News::create($data);
        if ($news) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer']
        ]);
        $news = News::destroy($request->get('id'));
        if ($news) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно удалена');
        }
        return back()->with('error', 'Не удалось');
    }

    public function download(Request $request)
    {
        $request->validate([
            'count' => ['required', 'integer']
        ]);
        $news = app(News::class);
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/newsAll.txt", response()->json($news->downloadNews($request->get('count'))), LOCK_EX);
        return response()->download('newsAll.txt');
    }
}
