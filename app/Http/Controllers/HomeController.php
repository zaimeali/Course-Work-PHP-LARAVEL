<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home()
    {
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
