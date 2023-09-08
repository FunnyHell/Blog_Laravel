<?php

namespace App\Models;

use App\Http\Controllers\PostImagesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    public static function store(\Illuminate\Http\Request $request)
    {
        $reg = '/src="data:image\/[a-z]{3,4};base64,/';
        $has_image = 0;
        $text = $request->summernote;
        if (preg_match($reg, $request->summernote)) {
            $has_image = 1;
            $result = PostImages::saveFromBase64($request->summernote);
            if ($result) {
                $images_ids = array_keys($result);
                $img_reg = '/(?<=<img src="|;" src=")(?:data:image\/)[^"]+/';
                $text = $request->summernote;

                preg_match_all($img_reg, $text, $matches);
                foreach ($matches[0] as $match) {
                    $replacement = array_shift($result); // Получаем следующее значение для замены
                    $text = str_replace($match, $replacement, $text);
                }
            }
        }
        $table_array = self::InsertPostArray($request, $text, $has_image);
        if ($has_image) {
            $id = DB::table('posts')->insertGetId($table_array);
            if (!PostImages::updateImageToPost($id, $images_ids)) return false;
        } else {
            if (!DB::table('posts')->insert($table_array)) return false;
        }
        return true;
    }

    private static function InsertPostArray(\Illuminate\Http\Request $request, mixed $text, int $has_image)
    {
        return [
            'title' => $request->title,
            'text' => $text,
            'level' => $request->level[0],
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->title),
            'has_image' => $has_image,
            'created_at' => now(),
            'updated_at' => now()];
    }

    public
    static function GetPosts()
    {
        if (count(func_get_args()) == 0) return DB::table('posts')->get();
        if (count(func_get_args()) == 1) return DB::table('posts')->where('user_id', func_get_args()[0])->get();
        else return null;
    }

    public static function GetPost($id)
    {
        return DB::table('posts')->where('id', $id)->first();
    }

    public static function IncrementeViewCount($id)
    {
        DB::table('posts')->where('id', $id)->increment('view_count');
    }
}
