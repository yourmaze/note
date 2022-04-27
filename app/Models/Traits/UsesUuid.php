<?php

namespace App\Models\Traits;

use Ramsey\Uuid\Uuid;

trait UsesUuid
{
    protected static function bootUsesUuid(): void
    {
        static::creating(static function ($model) {
            $model->{$model->getKeyName()} = (string) Uuid::uuid4();
        });
    }
    public function getIncrementing(): bool
    {
        return false;
    }
    public function getKeyType(): string
    {
        return 'string';
    }
}
