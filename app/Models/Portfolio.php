<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable =['user_id', 'title', 'title', 'body'];
            public function comments()
    {
        return $this->morphMany(comments::class, 'commentable');
    }
}
