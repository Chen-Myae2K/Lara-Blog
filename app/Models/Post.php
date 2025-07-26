<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['photos', 'user', 'category'];
    //with ဆို တဲ့ နာမည် အတိ ကျ နဲ့ ပေးရမယ်S

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function scopeSearch($query)
    {
        return $query->when(request('keyword'), function ($q) {
            $keyword = request('keyword');
            $q->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%");
        });
    }
}
