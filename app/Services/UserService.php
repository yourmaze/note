<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Dto\UserData;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authAnCreateToken(array $requestData): bool|string
    {
        $user = $this->userRepository->getByEmail($requestData['email']);
        if (!$user || !Hash::check($requestData['password'], $user->password)) {
            return false;
        }
        return $this->createToken($user, $requestData['device_name']);
    }

    public function createUserAndToken(array $requestData): string
    {
        //TODO: Сделать ДТО через spatie
        $userDto = (array)(new UserData())->fromRequest($requestData);
        $user = $this->userRepository->create($userDto);
        return $this->createToken($user, $requestData['device_name']);
    }

    public function createToken(User $user, string $tokenName): string
    {
        return $user->createToken($tokenName)->plainTextToken;
    }

    public function deleteUserAndTokens(mixed $userId): bool
    {
        $user = $this->userRepository->getOne($userId);
        $user->tokens()->delete();
        return $this->userRepository->delete($userId);
    }
}
