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
        $body = $request->input('body');
        $body = $this->convertB64Images($body);
        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $body,
            'status' => 'publish'
        ]);

        // Add image to attachments

        if ($request->uploaded_file) {
            $attachment = $post->attach(\Request::file('uploaded_file'));
        }
              
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
        $allAttachments = $post->attachments()->get();

        return view('post.view', ['post' => $post, 'allAttachments' => $allAttachments]);
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

    private function convertB64Images($detail){
      
        $dom = new \DomDocument();

        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    

        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){

            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/storage/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $detail = $dom->saveHTML();

        return $detail;

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

        $body = $request->input('body');
        $body = $this->convertB64Images($body);        
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'status' => 'publish',

        ]);

        $attachments = $post->attachments();
       
        if ($attachments) {
            $attachments->delete(); // Will also delete the file on the storage by default
        }
        
        if ($request->uploaded_file) {
            $attachment = $post->attach(\Request::file('uploaded_file'));
        }

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
