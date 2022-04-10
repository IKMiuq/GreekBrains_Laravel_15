<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    //primary key
    protected $primaryKey = 'id';
    //protected $timestamps = true;

    protected $fillable = ['id', 'title', 'image', 'description', 'is_active'];
    //  protected $guarded = ['id'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function news(): hasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }

}
