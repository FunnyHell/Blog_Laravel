<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostImages extends Model
{
    use HasFactory;

    public static function saveFromBase64($base64)
    {
        $reg = '/(?<=;base64,)[^>]+(?!>)/';
        $reg_type = '/(?<=data:image\/)[a-z]+(?=;base64)/';
        preg_match_all($reg_type, $base64, $matches_type);
        preg_match_all($reg, $base64, $matches);
        $paths = [];
        $ids = [];
        foreach ($matches[0] as $key => $match) {
            try {
                $image = base64_decode($match);
                $image_name = Str::random(10) . '.' . $matches_type[0][$key];
                if (!Storage::disk('public')->put('/img/' . $image_name, $image)) return false;
                $path = 'img/' . $image_name;
                array_push($ids, PostImages::store($path));
                array_push($paths, $path);
            } catch (Exception $e) {
                return false;
            }
        }
        $images = array_combine($ids, $paths);
        return $images;
    }

    public static function store($path)
    {
        return DB::table('post_images')->insertGetId(['url' => $path]);
    }

    public static function updateImageToPost(int $post_id, array $images_ids)
    {
        foreach ($images_ids as $image_id) {
            DB::table('post_images')->where('id', $image_id)->update(['post_id' => $post_id]);
        }
        return true;
    }

    public static function GetPostImages($id)
    {
        return DB::table('post_images')->where('post_id', $id)->get();
    }
}
