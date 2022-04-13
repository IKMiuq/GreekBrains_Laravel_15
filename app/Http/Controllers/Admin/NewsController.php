<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
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
        return view('admin.news.edit', ['news' => $news, 'categories' => Category::select('id', 'title')->get()]);
    }

    public function create()
    {
        return view('admin.news.create', ['categories' => Category::select('id', 'title')->get()]);
    }

    public function update(EditRequest $request, News $news)
    {
        if ($news->fill($request->validated())->save()) {
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error', __('messages.admin.news.update.fail'));
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $news = News::create($data);
        if ($news) {
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.fail'));
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
