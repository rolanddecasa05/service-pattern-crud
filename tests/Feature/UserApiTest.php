<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create(): void
    {
        $data = [
            'name' => fake()->name(),
            'email' => fake()->unique()->email(),
            'password' => '123456789',
            'username' => fake()->unique()->userName(),
        ];

        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
        ])->postJson('/api/auth/register', $data);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
       $response = $this->tokenizer();
        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
            ]);
        $this->test_getUsers($response['token']);
    }

    private function tokenizer()
    {
        $username = User::all()->random()->username;
        $data = [
            'username' => $username,
            'password' => '123456789',    
        ];

        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
        ])->postJson('/api/auth/login', $data);

        return $response;
    }

    /**
     * A basic feature test example.
     */
    public function test_getUsers(): void
    {
        $token = $this->tokenizer();
        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
            'Authorization' => 'Bearer '.$token['token']
        ])->getJson('/api/users');
        
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     */
    public function test_getUser(): void
    {
        $id = User::all()->random()->id;
        $token = $this->tokenizer();
        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
            'Authorization' => 'Bearer '.$token['token']
        ])->getJson('/api/users/'.$id);
        
        $response->assertStatus(200);
    }

     /**
     * A basic feature test example.
     */
    public function test_updateUser(): void
    {
        $data = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => '123456789',
            'username' => fake()->userName(),
        ];

        $id = User::all()->random()->id;
        $token = $this->tokenizer();
        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
            'Authorization' => 'Bearer '.$token['token']
        ])->putJson('/api/users/'.$id, $data);
        
        $response->assertStatus(200);
    }

     /**
     * A basic feature test example.
     */
    public function test_deleteUser(): void
    {
        $id = User::all()->random()->id;
        $token = $this->tokenizer();
        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
            'Authorization' => 'Bearer '.$token['token']
        ])->deleteJson('/api/users/'.$id);
        
        $response->assertStatus(200);
    }

}
