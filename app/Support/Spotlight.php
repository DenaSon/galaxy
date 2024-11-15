<?php

namespace App\Support;

use App\Models\Log;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;

class Spotlight
{
    public function search(Request $request)
    {
        try {
            // Validate the search input
            $request->validate([
                'search' => 'required|string|max:60|alpha_num',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {


        }

        // Perform the search if validation passes
        return collect()->merge($this->Products($request->input('search')));
    }

    public function Products(string $search = '')
    {
        return Product::query()
            ->where('name', 'like', "%$search%")
            ->take(8)
            ->get()
            ->map(function (Product $product) {
                return [

                    'name' => $product->name,
                    'icon' => Blade::render("<x-icon name='o-bolt' />"),
                    'description' => $product->description,
                    'link' => "/product/{$product->id}"
                ];
            });
    }




}
