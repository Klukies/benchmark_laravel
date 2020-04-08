<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FibonacciTest extends TestCase
{
    /** @test */
    public function it_can_get_fibonnaci_numbers(): void
    {
        $response = $this->get('/api/fibonacci');

        $response
            ->assertStatus(200)
            ->assertJsonStructure(['fibonacciNumbers' => []]);
    }
}
