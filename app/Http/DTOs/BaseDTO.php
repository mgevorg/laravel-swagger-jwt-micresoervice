<?php
declare(strict_types=1);

namespace App\Http\DTOs;

class BaseDTO
{
    public function __construct(array $arguments)
    {
        foreach ($arguments as $key => $value) {
            $this->$key = $value;
        }
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
