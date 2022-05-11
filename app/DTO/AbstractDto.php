<?php

namespace App\DTO;

use ReflectionClass;
use ReflectionProperty;
use TypeError;

abstract class AbstractDto
{
    public function __construct(array $data = [])
    {
        //unset($data['title']);
        $classProperties = $this->getClassProperties();

        foreach ($classProperties as $property => $validator) {
            if(!isset($data[$property]) && !$validator->isNullable && !$validator->hasDefaultValue) {
                $class = static::class;
                throw new TypeError("Non-nullable property `{$class}::{$property}` has not been initialized.");
            }

            $value = $data[$property] ?? $this->{$property} ?? null;

            // TODO: Сделать приведение типов
            $this->{$property} = $value;
        }
    }

    protected function getClassProperties(): array
    {
        $class = new ReflectionClass(static::class);
        $properties = [];

        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $reflectionProperty) {
            //$properties[$reflectionProperty->getName()] = $reflectionProperty->getType()->getName();
            $properties[$reflectionProperty->getName()] = new DtoValidator($reflectionProperty);
        }

        return $properties;
    }
}
