<?php

namespace App\Commude\Repositories;

use App\Commude\Contracts\UserInterface;
use App\Commude\Repositories\EloquentRepository;
use App\Models\User;

class UserRepository extends EloquentRepository implements UserInterface {

    public function __construct(public User $user)
    {
        parent::__construct($this->user);
    }
}