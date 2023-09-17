<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
    Route::post('/like', [LikeController::class, 'store'])->name('like');
    Route::get('/{id}/comments', [CommentController::class, 'GetPostParentComments'])->name('index');
    Route::get('/{id}/comment', [CommentController::class, 'GetPostAnswersComments'])->name('answers');
    Route::post('/{id}/reply', [CommentController::class, 'reply'])->name('reply');
    Route::post('/{id}/add-view', [PostController::class, 'AddView'])->name('add-view');
});
