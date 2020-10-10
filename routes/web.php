<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home')->name('Home');
Route::view('/contact', 'contact')->name('Contact');

Route::get('/post/{id}', function ($id) {
    return $id;
});

Route::get('/post/{id}/{author}', function ($id, $authorName) {
    return $id . " " . $authorName;
});

Route::get('/blog-post/{id?}', function ($id = 1) {
    $pages = [
        1 => [
            'title' => 'Hello from Post 1',
        ],
        2 => [
            'title' => 'Hello from Post 2',
        ],
    ];
    return view('blog-post', ['data' => $pages[$id]]);
})->name('Blog-Post');

// For Passing HTML aur JS
Route::get('/blog-page/{id?}', function ($id = 1) {
    $pages = [
        1 => [
            'title' => '<b>Hello from Post 1</b>',
        ],
        2 => [
            'title' => '<em>Hello from Post 2</em>',
        ],
    ];
    return view('blog-page', ['data' => $pages[$id]]);
});

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

