<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Attribute
    public function getImagePathAttribute()
    {
        if ($this->image) {
            return 'storage/posts/' . $this->image;
        } else {
            return "https://dummyimage.com/700x350/dee2e6/6c757d.jpg";
        }
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'category_id');
    }

}
