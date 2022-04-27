<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\DeleteRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\TokenRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $token = $this->userService->createUserAndToken($request->all());
        return response()->json(['token' => $token], 200);
    }

    public function token(TokenRequest $request): JsonResponse
    {
        $token = $this->userService->authAnCreateToken($request->all());
        if (!$token) {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
        }
        return response()->json(['token' => $token]);
    }

    public function delete(DeleteRequest $request): JsonResponse
    {
        $response = $this->userService->deleteUserAndTokens($request->id);
        return response()->json(['response' => $response], 200);
    }

}
