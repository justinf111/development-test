<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function testCanLogin()
    {
        $user = User::factory()->create(['password' => bcrypt('password')]);
        $response = $this->followingRedirects()->post('/login', ['email' => $user->email, 'password' => 'password']);
        $response->assertViewIs('dashboard');
        $this->assertAuthenticatedAs($user);
    }
}
