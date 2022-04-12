<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = app(News::class);
        return view('admin.news.index', ['news' => $news->getNews()]);
    }

    public function edit(Request $request)
    {
        $news = app(News::class);
        return view('admin.news.edit', ['news' => $news->getNewsById($request->get('news'))[0]]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);

        return response()->json(
            $request->only('name', 'author', 'description'), 201
        );
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
