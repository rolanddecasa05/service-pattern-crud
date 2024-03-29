<?php

namespace App\Commude\Services;

use App\Commude\Contracts\UserInterface;

class UserService {
    public function __construct(public UserInterface $repository) {}

    public function find(array $attr)
    {
        return $this->repository->find($attr, 'cars');
    }

    public function findById($id) {
        return $this->repository->findByid($id, 'cars');
    }

    public function create($data)
    {
        return $this->repository->create(data: $data);
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