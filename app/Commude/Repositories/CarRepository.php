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

    public function findWith(array $attr)
    {
        return $this->model::with('user')->paginate((array_key_exists('paginate', $attr)) ? $attr['paginate'] : 10);
    }
}