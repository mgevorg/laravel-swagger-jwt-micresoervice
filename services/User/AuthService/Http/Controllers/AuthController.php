<?php

namespace Services\User\AuthService\Http\Controllers;

use App\Http\Controllers\Controller;
use Services\User\AuthService\Http\Requests\UserAuthRequest;
use Services\User\AuthService\Http\DTOs\UserAuthDTO;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    /**
     * @OA\Post(
     *     path="/api/auth/login/",
     *     summary="User login and get token.",
     *     tags={"Authorization"},
     *     @OA\RequestBody(
     *          @OA\JsonContent(
     *               allOf={
     *                    @OA\Schema(
     *                         @OA\Property(property="email", type="string", example="user@user.user"),
     *                         @OA\Property(property="password", type="string", example="password"),
     *                    ),
     *               },
     *          ),
     *     ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *               @OA\Property(property="data", type="object",
     *                    @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjk5OTY1OTc5LCJleHAiOjE2OTk5Njk1NzksIm5iZiI6MTY5OTk2NTk3OSwianRpIjoiMWpVeVpGVWYzdlpZRnJDcyIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.dlAUe2hCZSviHBlkUlTw_R8YGyhUUZx-cSyyfNey2Mc"),
     *                    @OA\Property(property="type", type="string", example="bearer"),
     *                    @OA\Property(property="expires_in", type="integer", example=3600),
     *               ),
     *          ),
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *               @OA\Property(property="error", type="string", example="Unauthorized"),
     *          ),
     *     ),
     * ),
     */
    public function login(UserAuthRequest $request)
    {
        $userAuthDto = new UserAuthDTO($request->validated());
        $userAuthService = app('services.user.auth-service');
        return $userAuthService->login($userAuthDto);
    }

    /**
     * @OA\Post(
     *     path="/api/auth/user",
     *     summary="Get the authenticated user.",
     *     tags={"Authorization"},
     *     security={{"bearerAuth":{}}},
     *
     *     @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *               @OA\Property(property="data", type="object",
     *                    @OA\Property(property="id", type="integer", example=1),
     *                    @OA\Property(property="name", type="string", example="John Doe"),
     *                    @OA\Property(property="email", type="string", example="user@user.user"),
     *               ),
     *          ),
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *               @OA\Property(property="message", type="string", example="Unauthenticated."),
     *          ),
     *     ),
     * ),
     */
    public function user()
    {
        return app('services.user.auth-service')->user();
    }

    /**
     * @OA\Post(
     *     path="/api/auth/logout",
     *     summary="Log the user out and invalidate the token.",
     *     tags={"Authorization"},
     *     security={{"bearerAuth":{}}},
     *
     *     @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *               @OA\Property(property="message", type="string", example="Logged out"),
     *          ),
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *               @OA\Property(property="message", type="string", example="Unauthenticated."),
     *          ),
     *     ),
     * ),
     */
    public function logout()
    {
        return app('services.user.auth-service')->logout();
    }

    /**
     * @OA\Post(
     *     path="/api/auth/refresh",
     *     summary="Refresh the access token.",
     *     tags={"Authorization"},
     *     security={{"bearerAuth":{}}},
     *
     *     @OA\Response(
     *          response=200,
     *          description="OK",
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *               @OA\Property(property="message", type="string", example="Unauthenticated."),
     *          ),
     *     ),
     * ),
     */
    public function refresh()
    {
        return app('services.user.auth-service')->refresh();
    }
}
