<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getCategories() :array
    {
        return \DB::table($this->table)
            //->join('news', 'categories.id', '=', 'news.category_id')
            ->select("id", "title", "image", "description")
            //->groupBy('category_id')
            //->get('*', DB::raw('COUNT(1)'));
            ->get()
            ->toArray();
    }

    public function getCategoryById(int $id) :mixed
    {
        return \DB::table($this->table)->find($id);
    }
}
