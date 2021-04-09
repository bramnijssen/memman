<?php

namespace Tests\Unit;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticateTest extends TestCase
{
    public function test_authenticate_middleware()
    {
        $response = $this->get('/verify-email');
        $response->assertRedirect('/login');
    }

    public function test_authenticate_middleware_do_not_redirect_if_json()
    {
        $response = $this->getJson('/verify-email');
        $response->assertStatus(401);
    }
}
