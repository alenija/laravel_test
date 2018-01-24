<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // get all posts for category
    public function posts()
    {
//        return $this->belongsToMany(Post::class, 'post_categories'); // for many to many
        return $this->hasMany(Post::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
