<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_can_register(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Sally',
            'email' => 'sally@gmail9.com',
            'password' => 'password'
        ]);
 
        $response->assertStatus(200);
    }

    public function test_user_can_login(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'sally@gmail9.com',
            'password' => 'password'
        ]);
 
        $response->assertStatus(200);
    }

}
