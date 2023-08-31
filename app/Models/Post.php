<?php

namespace App\Models;

use App\Http\Controllers\PostImagesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    public static function store(\Illuminate\Http\Request $request)
    {
        $reg = '/<img style="[a-z]+: [0-9|.]+px;" src="data:image\/[a-z]{3,4};base64,/';
        if (preg_match($reg, $request->summernote)) $result = PostImages::saveFromBase64($request->summernote);
        if ($result) {
            $img_reg = '/(?<=px;" src=")[^>]+/';
            $text = $request->summernote;
            preg_match_all($img_reg, $text, $matches);
            foreach ($matches[0] as $match) {
                $replacement = array_shift($result); // Получаем следующее значение для замены
                $text = str_replace($match, $replacement, $text);
            }
            return DB::table('posts')->insert(['title' => 'test', 'text' => $text, 'level' => 1, 'user_id' => Auth::user()->id, 'slug' => 'test', 'created_at' => now(), 'updated_at' => now()]);
        }
        else return false;
    }
}
