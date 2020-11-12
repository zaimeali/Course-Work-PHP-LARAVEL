<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    // because we haven't used naming convention correctly
    // we have to define the table name

    // protected $table = 'blogposts';

    // or we can do
    // php artisan make:migration change_blogposts_table_name --table=blogposts

    // For using which property should be fillable
    protected $fillable = ['title', 'content'];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    // One way to delete
    public static function boot()
    {
        parent::boot();
        static::deleting(function (BlogPost $blogPost) {
            $blogPost->comments()->delete();
        });
    }
}
