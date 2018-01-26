<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * By including the guarded attribute but setting it to an empty array,
     * we are telling Eloquent to guard no columns.
     * So the default mass-assignment protections are disabled.
     *
     * @var array
     */
//    protected $guarded = [];

    protected $fillable = [ // attributes to which you can directly contact
        'user_id',
        'post_id',
        'parent_id',
        'text'
    ];

    protected $userId;

    public function __construct($params = [])
    {
        parent::__construct($params);

        $this->userId = \Auth::user()->id;
        $this->setUserIdAttribute($this->userId);
    }

    // get user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // get post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function setUserIdAttribute($userId)
    {
        if (isset($userId)) {
            $this->attributes['user_id'] = $userId;
        }
    }
}
