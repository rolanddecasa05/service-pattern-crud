<?php

namespace App\Commude\Contracts;

interface CrudInterface {
    public function find(array $attr);
    public function findById(string $id);
    public function create(array $data);
    public function update(string $id, array $data);
    public function delete(string $id);
    
}