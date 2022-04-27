<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}
