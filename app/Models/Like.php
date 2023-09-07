<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Like extends Model
{
    use HasFactory;

    public static function PostLike(\Illuminate\Http\Request $request)
    {
        $post_id = $request->post_id;
        $user_id = $request->user_id;
        if (!DB::table('likes')->where('user_id', $user_id)->where('post_id', $post_id)->exists()) {
            DB::table('likes')->insert(['user_id' => $user_id, 'post_id' => $post_id]);
            DB::table('posts')->where('id', $post_id)->increment('like_count');
            return json_encode(['like' => true]);
        } else {
            DB::table('likes')->where('user_id', $user_id)->where('post_id', $post_id)->delete();
            DB::table('posts')->where('id', $post_id)->decrement('like_count');
            return json_encode(['like' => false]);
        }
    }
}
