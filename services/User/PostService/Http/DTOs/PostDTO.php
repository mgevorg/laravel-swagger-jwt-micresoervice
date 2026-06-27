<?php
declare(strict_types=1);

namespace Services\User\PostService\Http\DTOs;

use App\Http\DTOs\BaseDTO;

class PostDTO extends BaseDTO
{
    public string $title;
    public int $likes;

    public function __construct(array $arguments)
    {
        foreach($arguments as $key => $value) {
            $this->$key = $value;
        }
    }
}
