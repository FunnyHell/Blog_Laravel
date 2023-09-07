<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::post('store', [PostController::class, 'store'])->name('store');
    Route::post('restore', [PostController::class, 'restore'])->name('restore'); #TODO
    Route::delete('delete', [PostController::class, 'delete'])->name('delete'); #TODO
    Route::post('publish', [PostController::class, 'publish'])->name('publish'); #TODO
    Route::post('unpublish', [PostController::class, 'unpublish'])->name('unpublish'); #TODO
    Route::get('/{id}/{slug}', [PostController::class, 'show'])->name('show');
});
