<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    public function blogpost()
    {
    	return $this->belongsTo(Blog::class);
    }

    public function bloguser()
    {
    	return $this->belongsTo(User::class);
    }
}
