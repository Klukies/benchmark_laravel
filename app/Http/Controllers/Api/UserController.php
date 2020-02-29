<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserController
{
    public function __invoke(Request $request)
    {
        $users = $request->has('country')
            ? $this->getUsersByCountry($request->input('country'))
            : User::with('countries')->get();

        return response()->json(['users' => $users]);
    }

    private function getUsersByCountry(string $country): Collection
    {
        return User::whereHas('countries', function (Builder $query) use ($country) {
            $query->where('name', $country);
        })->with('countries')->orderBy('users.id')->get();
    }
}
