<?php

namespace Services\User\AuthService\Contracts;

use Services\User\AuthService\Http\DTOs\UserAuthDTO;

interface AuthServiceInterface
{
    public function login(UserAuthDTO $userAuthDto);

    public function user();

    public function logout();

    public function refresh();
}
