<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HasInstitutionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_will_redirect_to_api_if_it_has_no_institution(): void
    {
        $response = $this->get('/api/middleware');

        $response->assertRedirect('/api');
    }

    /** @test */
    public function it_can_receive_users_if_it_has_an_institution(): void
    {
        $this->seed();
        $expected = User::with('countries')
            ->get()
            ->toArray();

        $response = $this->get('/api/middleware?institution=Howest');
        $response
            ->assertStatus(200)
            ->assertJson(['users' => $expected]);
    }
}
