<?php

namespace App\Repositories;

use App\Radar;

class RadarRepository 
{
    protected $entity;

    public function __construct(Radar $entity)
    {
        $this->entity = $entity;
    }

    public function getAll(int $pageSize)
    {
        return $this->entity
        ->orderBy('number', 'desc')
        ->paginate($pageSize);
    }

    public function create(array $data)
    {
        return $this->entity->create($data);
    }

    public function findById(int $id)
    {
        return $this->entity->find($id);
    }

    public function update(int $id, array $data)
    {
        $radar = $this->findById($id);

        return $radar->update($data);
    }

    public function delete(int $id)
    {
        $radar = $this->findById($id);

        return $radar->delete();
    }
}