<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public  function  index(){
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    
    public function  show($id){
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
    public function  create(){
        return view('posts.create');
    }
    public function  store(){
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->save();
        return redirect('/posts');
    }
    public function  edit($id){
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }
    public function  update($id){
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = Post::find($id);
        $post->title = request('title');
        $post->body = request('body');
        $post->save();
        return redirect('/posts');
    }
    public function  destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts');
    }
 
}
