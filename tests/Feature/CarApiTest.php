<?php

namespace Tests\Feature;

use App\Models\Car;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarApiTest extends TestCase
{
        /**
     * A basic feature test example.
     */
    public function test_createCar(): void
    {
        $data = [
            'name' => fake()->domainName(),
            'model' => fake()->company(),
            'make' => fake()->domainWord(),
            'vin' => fake()->tld(),
            'user_id' => User::all()->random()->id,
        ];
        
        $token = $this->tokenizer();

        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
            'Authorization' => 'Bearer '.$token
        ])->postJson('/api/cars', $data);

        $response->assertStatus(200);
    }


    private function tokenizer()
    {
        $data = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => '123456789',
            'username' => fake()->userName(),
        ];

        $user_response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
        ])->postJson('/api/auth/register', $data);

        $data = [
            'username' =>$user_response['username'],
            'password' => '123456789',    
        ];

        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
        ])->postJson('/api/auth/login', $data);

        return $response['token'];
    }

    /**
     * A basic feature test example.
     */
    public function test_getCars(): void
    {
        $token = $this->tokenizer();
        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
            'Authorization' => 'Bearer '.$token
        ])->getJson('/api/cars');
        
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     */
    public function test_getCar(): void
    {
         $id = Car::all()->random()->id;
         $token = $this->tokenizer();
         $response = $this->withHeaders([
             'Accept' => 'Application/json',
             'Content_type' => 'Application/json',
             'Authorization' => 'Bearer '.$token
         ])->getJson('/api/cars/'.$id);
        
         $response->assertStatus(200);
    }

     /**
     * A basic feature test example.
     */
    public function test_updateCar(): void
    {
        $data = [
            'name' => fake()->domainName(),
            'model' => fake()->company(),
            'make' => fake()->domainWord(),
            'vin' => fake()->tld(),
            'user_id' => User::all()->random()->id,
        ];

        $id = Car::all()->random()->id;
        $token = $this->tokenizer();
        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
            'Authorization' => 'Bearer '.$token
        ])->putJson('/api/cars/'.$id, $data);
        
        $response->assertStatus(200);
    }

     /**
     * A basic feature test example.
     */
    public function test_deleteCar(): void
    {
        $id = Car::all()->random()->id;
        $token = $this->tokenizer();
        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
            'Authorization' => 'Bearer '.$token
        ])->deleteJson('/api/cars/'.$id);
        
        $response->assertStatus(200);
    }
}
