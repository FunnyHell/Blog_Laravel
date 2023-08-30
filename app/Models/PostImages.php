<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostImages extends Model
{
    use HasFactory;

    public static function saveFromBase64($base64)
    {
        $reg = '/(?<=;base64,)[^"]+(?=")/';
        $reg_type = '/(?<=data:image\/)[a-z]+(?=;base64)/';
        preg_match_all($reg_type, $base64, $matches_type);
        preg_match_all($reg, $base64, $matches);
        foreach ($matches[0] as $key => $match) {
            try{
                $image = base64_decode($match);
                $image_name = Str::random(10) . '.' . $matches_type[0][$key];
                Storage::disk('public')->put($image_name, $image);
                #TODO: Save to DB
            } catch (Exception $e) {
                return -1;
            }
        }
        #TODO: return url's from DB
        return 0;
    }
}
