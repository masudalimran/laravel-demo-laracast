<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];
    protected $fillable = [
        "title",
        "excerpt",
        "body",
        "published_at",
        "category_id",
        "user_id",
        'imgUrl'
    ];

    public function scopeFilter($query, int|null $category_id = null)
    {
        if (request('search')) {
            $query
                ->when($category_id, fn($query, $c_id) => $query->where("category_id", $c_id))
                ->where(function ($query) {
                    $query->where("title", "like", "%" . request("search") . "%")
                        ->orWhere("body", "like", "%" . request("search") . "%");
                })
                ->orderBy('title');
        } else {
            $query->when($category_id, fn($query, $category_id) => $query->where("category_id", $category_id))->orderBy('title');
        }
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
