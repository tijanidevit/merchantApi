<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AuthController
 */
class AuthControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function register_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AuthController::class,
            'register',
            \App\Http\Requests\AuthRegisterRequest::class
        );
    }

    /**
     * @test
     */
    public function register_saves(): void
    {
        $response = $this->get(route('auth.register'));

        $this->assertDatabaseHas(posts, [ /* ... */ ]);
    }
}
