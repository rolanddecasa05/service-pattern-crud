<?php

namespace App\Commude\Repositories;

use App\Commude\Contracts\CrudInterface;
use App\Commude\Repositories\EloquentRepository;
use App\Models\User;

class UserRepository extends EloquentRepository implements CrudInterface {

    public function __construct(public User $user)
    {
        parent::__construct($this->user);
    }
}