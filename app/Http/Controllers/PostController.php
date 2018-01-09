<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;

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
        $authors = User::all();
        $authors_2 = User::where('name', 'Autor_2')
            ->orderBy('name', 'desc')
            ->take(10)
            ->get();

        $user = User::find(1);
        $posts_2 = $user->posts()->get();

//        $posts_3 = Post::with('user')->get();

        // all return is works
//        return $posts; // --- JSON
//        return view('posts.index', compact('posts'));
//        return view('posts.index')->with('posts', $posts);
        return view('posts.index', [
            'posts' => $posts,
            'posts_2' => $posts_2,
//            'posts_3' => $posts_3,
            'authors' => $authors,
            'authors_2' => $authors_2
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
//        if($request->user()->can_post())
//        {
            return view('posts.create');
//        }
//        else
//        {
//            return redirect('/')->withErrors('Errors');
//        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
