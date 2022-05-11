<?php

namespace App\Services;

use App\DTO\Entity\EntityDto;
use App\Repositories\EntityRepository;

class EntityService
{
    private EntityRepository $entity;

    public function __construct(EntityRepository $entity)
    {
        $this->entity = $entity;
    }

    public function getList(array $requestData = []): array
    {
        $entityCollection = [];
        $limit = $requestData['limit'] ?? null;
        $offset = $requestData['offset'] ?? null;
        $entities = $this->entity->findAll([], $limit, $offset);
        foreach ($entities as $entity) {
            $entityCollection[] = new EntityDto($entity);
        }
        return $entityCollection;
    }

    public function destroy(string $entityId): bool
    {
        return $this->entity->delete($entityId);
    }
}
