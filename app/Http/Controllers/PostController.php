<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth')  // it'll protect from all the routes of the post and it's action
            ->only(['create', 'store', 'edit', 'update', 'destroy']);  // define on which route should be protected
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(\App\Models\BlogPost::all());
        // dd(BlogPost::all());

        // Lazy Loading vs Eager Loading Start
        // DB::connection()->enableQueryLog();
        // $posts = BlogPost::all(); // Lazy Loading bcz not loading the comments here
        // $posts = BlogPost::with('comments')->get(); // Eager Loading
        // foreach ($posts as $post) {
        //     foreach ($post->comments as $comment) {
        //         echo $comment->content;
        //     }
        // }
        // dd(DB::getQueryLog());
        // Lazy Loading vs Eager Loading End

        return view(
            'posts.index', [
                // 'posts' => BlogPost::all(),
                'posts' => BlogPost::withCount('comments')->get(),
            ]
        );
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
        // dd($validatedData);

        // $blogPost = new BlogPost();
        // $blogPost->title = $request->input('title');
        // $blogPost->content = $request->input('content');
        // $blogPost->save();

        // another way to store data
        // called mass assignment
        $blogPost = BlogPost::create($validatedData);

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
        return view('posts.show', [
            'post' => BlogPost::with('comments')->findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $validatedData = $request->validated();

        $post->fill($validatedData);
        $post->save();
        $request->session()->flash('status', 'Blog post has been updated!');

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();

        // BlogPost::destroy($id);

        $request->session()->flash('status', 'Blog post has been deleted!');
        return redirect()->route('posts.index');
    }
}
