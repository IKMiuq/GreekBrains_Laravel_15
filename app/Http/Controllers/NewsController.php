<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Faker\Factory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    /**
     * @var \string[][]
     */

    public function sections() {
        return view('news.sections', ['category' => Category::active()->withCount('news')->get()]);
    }

    public function newsAll($section) {
        return view('news.list', ['newsAll' => News::where('category_id', '=', $section)->with('category')->get()]);
    }


    public function news($section, News $news_id)
    {
        return view('news.detail', ['newsDetail' => $news_id]);
    }
}
