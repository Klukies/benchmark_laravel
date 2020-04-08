<?php

namespace Tests\Feature;

use App\Country;
use Tests\TestCase;
use CountriesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_a_list_of_countries(): void
    {
        $this->seed(CountriesTableSeeder::class);
        $expected = Country::all()->toArray();
        $response = $this->get('/api/countries');

        $response
            ->assertStatus(200)
            ->assertJson(['countries' => $expected]);
    }
}
