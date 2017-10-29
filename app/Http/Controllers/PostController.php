<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    public function dashboard() {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('post.dashboard',  ['posts' => $posts] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'title' => 'required',
            
        ]);            
        
        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'status' => 'publish'
        ]);
              
        return redirect()->route('post.show', ['id' => $post->id]);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {   
        return view('post.view', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('post.create', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
        $this->validate($request, [
            'title' => 'required',            
        ]);
        
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'status' => 'publish',

        ]);

        return redirect()->route('post.show', ['id' => $post->id]);   
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // $this->authorize('destroyCustomer', $customer);
        
        $post->delete();

        return redirect('/admin/post');     
    }
}
