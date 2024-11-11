<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'desc')->get();

        return view('posts.index', compact('posts'));
    }

    public function index_contac(){
        return view('contacto');
    }

    public function create(){
        return view('posts.create');
    }

    public function show($post){

        $post = Post::find($post);
        return view('posts.show', compact('post'));
    }
}
