<?php

namespace App\Repositories\Dto;

use App\DTO\AbstractDto;

class UserData extends AbstractDto
{
    public string $name;
    public string $email;
    public string $password;
}
