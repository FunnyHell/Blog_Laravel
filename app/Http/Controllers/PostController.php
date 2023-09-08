<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImages;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public static function GetPosts()
    {
        if (count(func_get_args()) == 0) return Post::GetPosts() ?? false;
        if (count(func_get_args()) == 1) return Post::GetPosts(func_get_args()[0]) ?? false;
        else echo 'error: too many arguments';
    }

    public function store(Request $request)
    {
        if (Post::store($request)) return redirect(route('dashboard'));
        else echo 'error';
    }

    public function show($id)
    {
        Post::IncrementeViewCount($id);
        $post = Post::GetPost($id);
        if ($post->has_image) {
            $post_images = PostImages::GetPostImages($id);
            return view('post', ['post' => $post, 'images' => $post_images]);
        } else {
            return view('post', ['post' => $post,]);
        }
    }
}
