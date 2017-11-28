<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $posts = Post::paginate(5);
        return view('welcome', compact('posts'));
    }
    public function post($slug){
        $post = Post::findBySlug($slug);
        $comments = $post->comments()->whereIsActive(1)->get();
        return view('post1', compact('post', 'comments'));
    }
}
