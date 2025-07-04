<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function posts()
    {
        return $this->hasManyThrough(Post::class, User::class);
        //post တွေ ကို လိုချင်တာ, user ကို ဖြတ်သွားပြီးတော့ (arguments)
    }
}
