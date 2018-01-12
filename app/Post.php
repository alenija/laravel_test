<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{    
    public function __construct($params = [])
    {
        parent::__construct($params); // Calls Default Constructor
        $this->attributes['user_id'] = \Auth::user()->id ?? null;
    }
    
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [ // attributes to which you can directly contact
        'user_id',
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

    /**
     *  Converter
     */

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }
}
