<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Events\CarAddedEvent;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarEventListenerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_trigger_event(): void
    {
        $data = [
            'name' => fake()->domainName(),
            'model' => fake()->company(),
            'make' => fake()->domainWord(),
            'vin' => fake()->tld(),
            'user_id' => User::all()->random()->id,
        ];
        
        CarAddedEvent::dispatch($data);

        $this->assertDatabaseHas('cars', [
            'name' => $data['name'],
        ]);
    }
}
