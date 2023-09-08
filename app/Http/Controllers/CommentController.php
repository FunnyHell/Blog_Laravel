<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public static function GetPostComments($id)
    {
        return Comment::GetPostComments($id);
    }
}
