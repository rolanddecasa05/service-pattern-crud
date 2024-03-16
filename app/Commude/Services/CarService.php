<?php

namespace App\Commude\Services;

use App\Commude\Contracts\CarInterface;
use App\Events\CarAddedEvent;

class CarService {
    public function __construct(public CarInterface $repository) {}

    public function find(array $attr)
    {
        return $this->repository->find($attr, 'users');
    }

    public function findById($id) {
        return $this->repository->findByid($id, 'users');
    }

    public function create($data)
    {
        return CarAddedEvent::dispatch($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update(id: $id, data: $data);
    }

    public function delete($id)
    {
        return $this->repository->delete(id: $id);
    }
}