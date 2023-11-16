<?php

namespace Services\User\PostService\Http;

use Illuminate\Support\Facades\Route;
use Services\User\AuthService\Http\Controllers\PostController;

Route::prefix('posts')->middleware('api')->controller(PostController::class)->group(function(){

});
