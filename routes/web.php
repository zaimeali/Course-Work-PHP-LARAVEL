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

Route::view('/', 'home')->name('Index');
Route::get('/home', 'HomeController@home')->name('Home');
Route::get('/contact', 'HomeController@contact')->name('Contact');
Route::resource('/posts', 'PostController')->only(['index', 'show']);
// Route::resource('/posts', 'PostController');

// Route::get('/blog-post/{id?}', 'HomeController@blogPost')->name('Blog-Post');

// Route::get('/post/{id}', function ($id) {
//     return $id;
// });

// Route::get('/post/{id}/{author}', function ($id, $authorName) {
//     return $id . " " . $authorName;
// });

// For Passing HTML aur JS
// Route::get('/blog-page/{id?}', function ($id = 1) {
//     $pages = [
//         1 => [
//             'title' => '<b>Hello from Post 1</b>',
//         ],
//         2 => [
//             'title' => '<em>Hello from Post 2</em>',
//         ],
//     ];
//     return view('blog-page', ['data' => $pages[$id]]);
// });

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::view('/contact', 'contact')->name('Contact');
