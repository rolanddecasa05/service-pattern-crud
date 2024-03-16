<?php

namespace App\Commude\Repositories;

use App\Commude\Contracts\CarInterface;
use App\Commude\Repositories\EloquentRepository;
use App\Models\Car;

class CarRepository extends EloquentRepository implements CarInterface {

    public function __construct(public Car $car)
    {
        parent::__construct($this->car);
    }
}