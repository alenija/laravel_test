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
    protected $guarded = [];
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
}
