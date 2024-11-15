<?php

namespace App\Support;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class Spotlight
{
    public function search(Request $request)
    {
        return collect()
            ->merge($this->users($request->search));

    }

    public function users(string $search = '')
    {
        return User::query()
            ->where('first_name', 'like', "%$search%")
            ->take(5)
            ->get()
            ->map(function (User $user) {
                return [

                    'name' => $user->first_name,
                    'description' => $user->email,
                    'link' => "/users/{$user->id}"
                ];
            });
    }




}
