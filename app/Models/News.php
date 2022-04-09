<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews() :array
    {
        return \DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as categoryTitle')
            ->where([
                ['status', '=', 'ACTIVE']
            ])
            ->orderBy('id', 'asc')
            //->groupBy('news.category_id')
            ->get()
            ->toArray();
    }

    public function getNewsByCategory($categoryId='') :array
    {
        return \DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as categoryTitle')
            ->where([
                ['status', '=', 'ACTIVE'],
                ['category_id', '=', $categoryId]
            ])
            //->groupBy('news.category_id')
            ->get()
            ->toArray();
    }

    public function getNewsById(int $id) :mixed
    {
        return \DB::table($this->table)
            ->select('*')
            ->where('id', '=', $id)
            ->get()
            ->toArray();
    }

    public function downloadNews(int $count) :mixed
    {
        return \DB::table($this->table)
            ->take($count)
            ->get()
            ->toArray();
    }
}
