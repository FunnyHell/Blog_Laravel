<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public static function GetPostParentComments($id)
    {
        return Comment::GetPostParentComments($id);
    }

    public static function GetPostAnswersComments($id)
    {
        return Comment::GetPostAnswersComments($id);
    }

    public static function reply(Request $request)
    {
        return Comment::reply($request);
    }
}
