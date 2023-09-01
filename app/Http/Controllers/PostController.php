<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public static function GetPosts()
    {
        if(count(func_get_args()) == 0) return Post::GetPosts() ?? false;
        if(count(func_get_args()) == 1) return Post::GetPosts(func_get_args()[0]) ?? false;
        else echo 'error: too many arguments';
    }

    public function store(Request $request){
        if(Post::store($request)) return redirect(route('dashboard'));
        else echo 'error';
    }

    public function show(Post $post){
        return view('post', ['post'=>Post::GetPost($post->id)]);
    }
}
