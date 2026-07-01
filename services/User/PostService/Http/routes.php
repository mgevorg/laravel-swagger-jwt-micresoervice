<?php

namespace Services\User\PostService\Http;

use Illuminate\Support\Facades\Route;
use Services\User\PostService\Http\Controllers\PostController;

Route::get('posts', [PostController::class, 'index']);
Route::resource('posts', PostController::class)->except(['index'])->middleware('jwt.auth');
Route::post('posts/multi', [PostController::class, 'create']);
