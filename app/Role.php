<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // get all users for role
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
