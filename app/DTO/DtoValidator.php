<?php

namespace App\DTO;

use ReflectionClass;
use ReflectionProperty;

class DtoValidator
{
    public string $type;
    public bool $isNullable;
    public bool $hasDefaultValue;

    public function __construct(ReflectionProperty $reflection)
    {
        $this->type = $this->setType($reflection);
        $this->isNullable = $this->nullableResolver($reflection);
        $this->hasDefaultValue = $this->checkDefaultValue($reflection);
    }

    private function nullableResolver(ReflectionProperty $reflection): ?bool
    {
        return $reflection->getType()?->allowsNull();
    }

    private function setType(ReflectionProperty $reflection): string
    {
        return $reflection->getType()?->getName();
    }

    private function checkDefaultValue(ReflectionProperty $reflection): ?bool
    {
        return $reflection->hasDefaultValue();
    }
}
