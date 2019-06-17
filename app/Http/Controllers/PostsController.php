<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\UserPost;
use App\Comment;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // return response()->json(count($posts));
        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title'=>'required',
            'body'=>'required'
        ];

        $request->validate($rules);

        $post = Post::create([
            'title'=>$request->title,
            'body'=>$request->body
        ]);

        UserPost::create([
            'user_id' => 102,
            'post_id' => $post->id
        ]);

        //$user = User::find(102);

        //$post->author()->save(102);
        //$post->author()->save(auth()->user()->id); //use this!

        return redirect()->route('posts.show', 'post_id');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load('author', 'comments');
        return view('post-show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('post-edit', compact('post'));
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
        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        $request->validate($rules);

        $post->title = $request->title;
        $post->body = $request->body;
        // $post->touch();
        $post->save();

        return view('post-show', compact('post'));
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
        return redirect()->route('posts');
    }

    public function storeComment(Request $request) {
        $rules = [
            'comment' => 'required'
        ];

        $request->validate($rules);

        Comment::create([
            'body'=>$request->comment
        ]);
        PostComment::create([
            'post_id'=>$request->post_id,
            'comment_id'=>$comment->id
        ]);

        return redirect()->route('posts.show', $request->post_id);

    }
}
