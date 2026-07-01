<?php
declare(strict_types=1);

namespace Services\User\PostService\Http\DTOs;

use App\Http\DTOs\BaseDTO;

class PostDTO extends BaseDTO
{
    public readonly string $title;
    public readonly int $likes;
}
