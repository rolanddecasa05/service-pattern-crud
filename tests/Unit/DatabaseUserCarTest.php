<?php

namespace Tests\Unit;

use App\Models\Car;
use Tests\TestCase;
use App\Models\User;

class DatabaseUserCarTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_users_can_be_instantiated(): void
    {
        $user = User::factory()->create();
    
        $this->assertModelExists($user);
    }

    /**
     * A basic unit test example.
     */
    public function test_cars_can_be_instantiated(): void
    {
        $car = Car::factory()->create();
    
        $this->assertModelExists($car);
    }
}
