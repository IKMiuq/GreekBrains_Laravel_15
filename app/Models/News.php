<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    //primary key
    protected $primaryKey = 'id';

    protected $fillable = ['title', 'image', 'author', 'status', 'category_id', 'description', 'updated_at'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
