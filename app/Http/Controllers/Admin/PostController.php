<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// namespace for mails
use App\Mail\PostMail;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{   
    private $validationArray = [
        'title' => 'required|max:100',
        'body' => 'required',
        'img_path' => 'image'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return index of posts
        $posts = Post::all()->where('user_id', Auth::id());
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // no empty fields!!!
        $request->validate($this->validationArray);

        $data = $request->all();

        $newPost = new Post();
        $newPost['slug'] = Str::slug($data['title']);
        $newPost['user_id'] = Auth::id();

        if (!empty($data['img_path'])) {
            $data['img_path'] = Storage::disk('public')->put('images', $data['img_path']);
        }
        
        $newPost->fill($data);
        // save new post
        $newPost->save();

        Mail::to('pippo@mail.com')->send(new PostMail());
        return redirect()->route('admin.posts.index')->with('message','Post aggiunto corretamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        return view('admin.posts.update', compact('post'));
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
        //
        // no empty fields!!!
        $request->validate($this->validationArray);

        $data = $request->all();
        $post->update($data);
       
        return redirect()->route('admin.posts.index')->with('message','Post modificato corretamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message','Post eliminato corretamente');
    }
}
