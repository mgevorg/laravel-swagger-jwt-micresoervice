<?php

namespace Services\User\PostService\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Services\User\PostService\Http\DTOs\PostDTO;

interface PostServiceInterface
{
    public function index(): Collection;

    public function store(PostDTO $postDto): Post;

    public function update(Post $post, PostDTO $postDto): Post;

    public function destroy(Post $post): void;
}
