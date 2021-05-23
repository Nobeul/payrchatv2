<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    public function post()
    {
    	return $this->belongsTo(Blog::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
