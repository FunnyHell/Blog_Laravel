<?php

namespace App\Http\Controllers;

use App\Models\LevelAccess;
use Illuminate\Http\Request;

class LevelAccessController extends Controller
{
    //
    public static function getPostsLevels()
    {
        return LevelAccess::getPostsLevels();
    }
}
