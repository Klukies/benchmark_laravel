<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_a_list_of_users(): void
    {
        $this->seed();
        $expected = User::with('countries')
            ->get()
            ->toArray();

        $response = $this->get('/api/users');

        $response
            ->assertStatus(200)
            ->assertJson(['users' => $expected]);
    }

    /** @test */
    public function it_can_get_a_list_of_users_by_visited_country(): void
    {
        $this->seed();
        $expected = User::whereHas('countries', function (Builder $query) {
            $query->where('name', 'Belgium');
        })->with('countries')->orderBy('users.id')->get()->toArray();

        $response = $this->get('/api/users?country=Belgium');

        $response
            ->assertStatus(200)
            ->assertJson(['users' => $expected]);
    }
}
