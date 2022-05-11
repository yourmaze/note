<?php

namespace App\DTO\Entity;

use App\DTO\AbstractDto;

class EntityDto extends AbstractDto
{
    public string $title = 'test';
    public string $desc;
    public int $type;
    public string $url;
}
