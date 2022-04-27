<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

//TODO: Add methods get all and get one by id

abstract class BaseRepository
{
    private Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getOne(mixed $id)
    {
        return $this->model::find($id);
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
        return $this->model::find($id)->delete();
    }
}
