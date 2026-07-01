<?php
declare(strict_types=1);

namespace Services\User\AuthService\Http\DTOs;

use App\Http\DTOs\BaseDTO;

class UserAuthDTO extends BaseDTO
{
    public readonly string $email;
    public readonly string $password;
}
