<?php

namespace App\Repositories;

use App\Driver;

class DriverRepository 
{
    protected $entity;

    public function __construct(Driver $entity)
    {
        $this->entity = $entity;
    }

    public function getAll(int $pageSize)
    {
        return $this->entity
        ->orderBy('name', 'desc')
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
        $driver = $this->findById($id);

        return $driver->update($data);
    }

    public function delete(int $id)
    {
        $driver = $this->findById($id);
        
        return $driver->delete();
    }
}