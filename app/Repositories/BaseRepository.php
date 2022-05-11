<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

//TODO: Add methods get all and get one by id

abstract class BaseRepository
{
    private Model $model;
    private const COUNT_PER_PAGE = 23;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getOne(mixed $id)
    {
        return $this->model::find($id);
    }

    public function findAll(array $filter = [], ?int $limit, ?int $offset = null)
    {
        $query = $this->buildQuery($filter);
        if($limit == null) {
            $limit = self::COUNT_PER_PAGE;
        }
        $query->limit($limit);

        if($limit !== null && $offset !== null) {
            $query->offset($offset);
        }

        return $query->get()->toArray();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function update(mixed $id, array $data)
    {
        return $this->model::find($id)->update($data);
    }

    public function delete(mixed $id)
    {
        return $this->model::findOrFail($id)->delete();
    }

    protected function buildQuery(array $filter): Builder
    {
        $model = $this->model;
        $query = $model::query();
        /*foreach ($filter as $filterItem) {
            $query = $filterItem->addToQuery($query);
        }*/
        return $query;
    }
}
