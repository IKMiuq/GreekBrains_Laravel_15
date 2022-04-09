<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }

    public function edit()
    {
        return view('admin.news.edit');
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
        $newsAll = $this->getNews(0, 0, $request->get('count'));
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/newsAll.txt", response()->json($newsAll), LOCK_EX);
        return response()->download('newsAll.txt');
    }
}
