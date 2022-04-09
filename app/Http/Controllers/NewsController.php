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
        $category = app(Category::class);
        return view('news.sections', ['category' => $category->getCategories()]);
    }

    public function newsAll($newsId) {
        $news = app(News::class);
        return view('news.list', ['newsAll' => $news->getNewsByCategory($newsId)]);
    }


    public function news($section, $id)
    {
        $news = app(News::class);
        return view('news.detail', ['newsDetail' => $news->getNewsById($id)[0]]);
    }
}
