<?php

namespace Tests\Feature;

use App\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValidatesCountryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_receive_countries()
    {
        $this->seed();
        $expected = Country::whereIn('name', ['Belgium', 'France'])
            ->get()
            ->toArray();

        $response = $this->get('/api/validation?countries[]=Belgium&countries[]=France');

        $response
            ->assertStatus(200)
            ->assertJson(['countries' => $expected]);
    }

    /** @test */
    public function it_will_have_errors_if_the_request_has_no_countries()
    {
        $this->seed();
        $response = $this->get('/api/validation');

        $response->assertSessionHasErrors();
    }
}
