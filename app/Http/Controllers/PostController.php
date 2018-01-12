<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param  Request  $request
     */
    public function index(Request $request)
    {
        $posts = Post::all();

        // all return is works
//        return view('posts.index')->with('posts', $posts);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request  $request)
    {
        $categoriesToArray = [];
        $post = Post::class;
        $categories = Category::all(['id','name'])->toArray();
        foreach ($categories as $category) {
            $categoriesToArray[$category['id']] = $category['name'];
        }

        return view('posts.create',[
            'post' => $post,
            'categories' => $categoriesToArray
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'text' => 'required|max:255'
        ]);

//        $post = new Post();
//
//        $post->setTitleAttribute($request->input('title'));
//        $post->text = $request->input('text');
//        $post->category_id = $request->input('category_id');
//        $post->user_id = \Auth::user()->id;
//
//        $post->save();

        $input = $request->all();
//        $input['user_id'] = \Auth::user()->id;
        Post::create($input);

        Session::flash('flash_message', 'Post successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categoriesToArray = [];
        $categories = Category::all(['id','name'])->toArray();
        foreach ($categories as $category) {
            $categoriesToArray[$category['id']] = $category['name'];
        }

        $post = Post::findOrFail($post->id);

        return view('posts.edit',[
            'post' => $post,
            'categories' => $categoriesToArray
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::findOrFail($post->id);
        $this->validate($request, [
            'title' => 'required|max:255',
            'text' => 'required|max:255'
        ]);
        // The update method, like the insert method, accepts an array of column and value pairs containing the columns to be updated
        // (mass assignable)
        $post->update($request->all());

        Session::flash('flash_message', 'Post successfully updated!');
        
        return redirect('posts/'. $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::findOrFail($post->id);
        $post->delete();

        Session::flash('flash_message', 'Post successfully deleted!');

        return redirect()->route('posts.index');
    }
}
