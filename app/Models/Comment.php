<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;

    public static function GetPostComments($id)
    {
        $nullArray = DB::table('comments')
            ->where('post_id', $id)
            ->where('reply_id', null)
            ->orderBy('reply_id')
            ->LeftJoin('users', function ($join) {
                $join->on('comments.user_id', 'users.id');
            })
            ->select('comments.*', 'users.nickname', 'users.profile_photo_path', 'users.role')
            ->get();
        $notNullArray = DB::table('comments')
            ->where('post_id', $id)
            ->where('reply_id', '!=', null)
            ->orderBy('reply_id')
            ->LeftJoin('users', function ($join) {
                $join->on('comments.user_id', 'users.id');
            })
            ->select('comments.*', 'users.nickname', 'users.profile_photo_path', 'users.role')
            ->get();

        if (!empty($notNullArray)) { //If we have reply
            $array = self::SortingByReplies($nullArray, $notNullArray);
        } else $array = $nullArray;

        $author_id = DB::table('posts')->where('id', $id)->first('user_id');
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

    private static function TimeDifference($timeDiff){
        switch ($timeDiff){
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

    private static function SortingByReplies($nullArray, $notNullArray)
    {
        $finalArray[0] = $nullArray[0];
        $nnCounter = 0;

        for ($i = 1; $i <= count($nullArray); $i++) { //We traversal array by main commentaries (without reply)
            if ($finalArray[count($finalArray) - 1]->reply_id === null) { //If main commentary is last we find and push replies
                $k = count($finalArray) - 1;

                do { //Pushing replies until reply_id === id in last element of summary array which was last in the 22 row at if statement
                    $finalArray[] = $notNullArray[$nnCounter];
                    $nnCounter++;
                } while ($nnCounter < count($notNullArray) && $notNullArray[$nnCounter]->reply_id === $finalArray[$k]->id);

                //We must have $i <= count($nullArray) because we can have replies for last element at nullArray
                if ($i != count($nullArray)) $finalArray[] = $nullArray[$i];
            }
        }
        return $finalArray;
    }
}
