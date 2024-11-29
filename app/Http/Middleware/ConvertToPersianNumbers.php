<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConvertToPersianNumbers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        // Apply conversion for all input data in Livewire and standard requests
        foreach ($request->all() as $key => $value) {
            if (is_string($value)) {
                // Apply Persian to English number conversion
                $request->merge([$key => $this->convertPersianNumbers($value)]);
            }
        }

        return $next($request);
    }


    private function convertPersianNumbers(string $string): string
    {
        $persian_numbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $persian_to_english_map = array_combine($persian_numbers, $english_numbers);
        return strtr($string, $persian_to_english_map);
    }

}
