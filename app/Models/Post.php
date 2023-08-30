<?php

namespace App\Models;

use App\Http\Controllers\PostImagesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static function store(\Illuminate\Http\Request $request)
    {
        $reg = '/<img style="[a-z]+: [0-9|.]+px;" src="data:image\/[a-z]{3,4};base64,/';
        if (preg_match($reg, $request->summernote)) $result = PostImages::saveFromBase64($request->summernote);
        if ($result != -1) {
            #TODO: Save to DB, call PostImages function for inserting post_id for images
        }
    }
}
