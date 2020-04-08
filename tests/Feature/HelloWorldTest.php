<?php

namespace Tests\Feature;

use Tests\TestCase;

class HelloWorldTest extends TestCase
{
    /** @test */
    public function testBasicTest(): void
    {
        $response = $this->get('api');

        $response->assertStatus(200);
    }
}
