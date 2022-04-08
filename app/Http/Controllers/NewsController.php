<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    /**
     * @var \string[][]
     */

    public function sections() {
        $newsSection = $this->getSections(3);
        return view('news.sections', compact('newsSection'));
    }

    public function newsAll() {
        $newsAll = $this->getNews(0, 0, 15);
        return view('news.list', compact('newsAll'));
    }


    public function news($id)
    {
        $newsDetail = $this->getNews(0, $id);
        return view("news.detail", compact('newsDetail'));
    }
}
