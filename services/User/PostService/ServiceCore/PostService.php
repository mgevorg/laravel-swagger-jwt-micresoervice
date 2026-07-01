<?php
declare(strict_types=1);

namespace Services\User\PostService\ServiceCore;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Services\User\PostService\Contracts\PostServiceInterface;
use Services\User\PostService\Http\DTOs\PostDTO;

class PostService implements PostServiceInterface
{
    public function index(): Collection
    {
        return Post::get();
    }

    public function show(Post $post): Post
    {
        return $post;
    }

    public function store(PostDTO $postDto): Post
    {
        return Post::create($postDto->toArray());
    }

    public function update(Post $post, PostDTO $postDto): Post
    {
        $post->update($postDto->toArray());
        return $post;
    }

    public function destroy(Post $post): void
    {
        $post->delete();
    }
}
