<?php

namespace Services\User\PostService\Http;

use Illuminate\Support\Facades\Route;
use Services\User\PostService\Http\Controllers\PostController;

Route::post('posts/multi', [PostController::class, 'create'])->middleware('jwt.auth');
Route::resource('posts', PostController::class)->except(['index'])->middleware('jwt.auth');
