<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(\App\Models\BlogPost::all());
        // dd(BlogPost::all());
        return view('posts.index', ['posts' => BlogPost::all()]);
        // return view('posts.index', ['posts' => []]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'required|max:100|min:5',
        //     'content' => 'required|min:10',
        // ]);
        $validatedData = $request->validated();
        dd($validatedData);

        $blogPost = new BlogPost();
        $blogPost->title = $request->input('title');
        $blogPost->content = $request->input('content');
        $blogPost->save();

        $request->session()->flash('status', 'Blog Post was created successfully');

        return redirect()->route('posts.show', ['post' => $blogPost->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // dd(\App\Models\BlogPost::findOrFail($id));
        // dd(BlogPost::findOrFail($id));
        // $request->session()->reflash(); // just to save for some time more after creating the post
        // but commenting bcz it will store the session for long time
        return view('posts.show', ['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
