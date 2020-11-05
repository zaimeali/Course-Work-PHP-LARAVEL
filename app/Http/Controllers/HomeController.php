<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        // dd(Auth::id()); // it'll tell the id of user
        // dd(Auth::user()); // it'll tell the user info
        // dd(Auth::check()); // it'll check if user is authenticated or not
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }

    public function blogPost($id = 1)
    {
        $pages = [
            1 => [
                'title' => 'Hello from Post 1',
            ],
            2 => [
                'title' => 'Hello from Post 2',
            ],
        ];
        return view('blog-post', ['data' => $pages[$id]]);
    }
}
