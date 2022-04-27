<?php

namespace App\Repositories\Dto;

class UserData extends AbstractDto
{
    public string $name;
    public string $email;
    public string $password;

    public function fromRequest(array $data): UserData
    {
        $dto = new self();
        $dto->name = $data['name'];
        $dto->email = $data['email'];
        $dto->password = bcrypt($data['password']);
        return $dto;
    }
}
