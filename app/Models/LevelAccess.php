<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LevelAccess extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function getPostsLevels()
    {
        return DB::table('level_accesses')->where('user_id', Auth::user()->id)->distinct()->get('access_to_posts_level');
    }
}
