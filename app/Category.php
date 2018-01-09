<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // get all posts for category
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
