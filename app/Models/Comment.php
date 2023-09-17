<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;

    public static function GetPostParentComments($id)
    {
        #TODO: Remake function on this rules:
        #TODO: 2. Make function to get replies, where:
        #TODO: 2.1. get comments with reply_id = id of current comment
        #TODO: 2.2. traversal array with replies for adding to them columns: reply_user_name, reply_text
        $array = DB::table('comments')
            ->where('post_id', $id)
            ->where('is_deleted', false)
            ->where('reply_id', null)
            ->LeftJoin('users', function ($join) {
                $join->on('comments.user_id', 'users.id');
            })
            ->select('comments.*', 'users.nickname', 'users.profile_photo_path', 'users.role')
            ->paginate(20);

        $array = self::AddColumns($array, $id);

        return json_encode($array);
    }

    public static function GetPostAnswersComments($id)
    {
        $array = DB::table('comments')
            ->where('reply_id', $id)
            ->where('is_deleted', false)
            ->orderBy('reply_id')
            ->orderBy('id')
            ->LeftJoin('users', function ($join) {
                $join->on('comments.user_id', 'users.id');
            })
            ->select('comments.*', 'users.nickname', 'users.profile_photo_path', 'users.role')
            ->paginate(10);
        $post_id = $array[0]->post_id;
        $array = self::AddColumns($array, $post_id);
        foreach ($array as $item) {
            $reply_user_name = DB::table('users')->where('id', $item->reply_author_id)->first('nickname');
            $item->reply_user_name = $reply_user_name->nickname;
            $reply_text = DB::table('comments')->where('id', $item->reply_id)->first('text');
            $item->reply_text = $reply_text->text;
        }

        return json_encode($array);
    }

    private static function GetPostAnswer($id)
    {
        $data = DB::table('comments')
            ->where('comments.id', $id)
            ->leftJoin('users', function ($join) {
                $join->on('comments.user_id', 'users.id');
            })
            ->select('comments.*', 'users.nickname', 'users.profile_photo_path', 'users.role')
            ->first();

        if (DB::table('comments')
            ->where('reply_id', $data->id)
            ->first()) $data->has_replies = true;
        else $data->has_replies = false;
        $author_id = DB::table('posts')->where('id', $data->post_id)->first('user_id');
        if ($data->updated_at === null) {
            $data->was_updated = false;
            $timeDiff = date_diff(Carbon::parse($data->created_at), now());
        } else {
            $data->was_updated = true;
            $timeDiff = date_diff(Carbon::parse($data->created_at), now());
        }
        $data->time = self::TimeDifference($timeDiff);

        //For marking author this post
        if ($data->user_id === $author_id->user_id) $data->post_author = true;
        else $data->post_author = false;

        $reply_user_name = DB::table('users')->where('id', $data->reply_author_id)->first('nickname');
        $data->reply_user_name = $reply_user_name->nickname;
        $reply_text = DB::table('comments')->where('id', $data->reply_id)->first('text');
        $data->reply_text = $reply_text->text;

        return $data;
    }

    private static function AddColumns($array, $post_id)
    {
            foreach ($array as $item) {
                if (DB::table('comments')
                    ->where('reply_id', $item->id)
                    ->first()) $item->has_replies = true;
                else $item->has_replies = false;
            }

            $author_id = DB::table('posts')->where('id', $post_id)->first('user_id');
            foreach ($array as $item) {
                //For making time difference
                if ($item->updated_at === null) {
                    $item->was_updated = false;
                    $timeDiff = date_diff(Carbon::parse($item->created_at), now());
                } else {
                    $item->was_updated = true;
                    $timeDiff = date_diff(Carbon::parse($item->created_at), now());
                }
                $item->time = self::TimeDifference($timeDiff);

                //For marking author this post
                if ($item->user_id === $author_id->user_id) $item->post_author = true;
                else $item->post_author = false;
            }
        return $array;
    }

    private static function TimeDifference($timeDiff)
    {
        switch ($timeDiff) {
            case $timeDiff->m > 0:
                return 'long time ago';
            case $timeDiff->h === 0:
                return $timeDiff->i . 'м';
            case $timeDiff->d === 0:
                return $timeDiff->h . 'ч ' . $timeDiff->i . 'м';
            default:
                return $timeDiff->d . 'д ' . $timeDiff->h . 'ч ';
        }
    }

    public static function reply(\Illuminate\Http\Request $request)
    {
        $data = DB::table('comments')->insertGetId([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'reply_id' => $request->reply_id,
            'reply_author_id' => $request->reply_author_id,
            'text' => $request->text,
            'created_at' => now()]);
        if ($data) return self::GetPostAnswer($data);
        return $data;
    }
}
