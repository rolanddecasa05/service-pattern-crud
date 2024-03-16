<?php

namespace App\Commude\Contracts;

interface CarInterface {
    public function find(array $attr, string $relation);
    public function findById(string $id, string $relation);
    public function create(array $data);
    public function update(string $id, array $data);
    public function delete(string $id);
    
}