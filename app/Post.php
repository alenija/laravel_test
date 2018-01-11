<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'text'
    ];

    // get all comments for post
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
//        return $this->belongsToMany(Category::class, 'post_categories'); // for many to many
        return $this->belongsTo(Category::class);
    }

    // get user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }
}
