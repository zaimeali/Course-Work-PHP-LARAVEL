<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // blog_post_id
    public function blogPost()
    {
        // if foreign key have different name then second param
        // return $this->belongsTo('App\Models\BlogPost', 'post_id');
        return $this->belongsTo('App\Models\BlogPost');
    }
}
