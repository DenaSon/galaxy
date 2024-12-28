<?php

namespace App\Livewire\App\Ai;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class Gemini extends Component
{
use Toast;

        public function mount()
        {

                $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent";
                $apiKey = "AIzaSyBID4O4vQayLQodQwfwA-zqtqYNK6f2Yok";

                $payload = [
                    "contents" => [
                        [
                            "parts" => [
                                ["text" => "Explain how AI works"]
                            ]
                        ]
                    ]
                ];

                // Make the HTTP POST request
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])->post("{$url}?key={$apiKey}", $payload);

                // Handle response
                if ($response->successful()) {
                    dd( response()->json($response->json()
                    ))
                     ;
                } else {
                     response()->json([
                        'error' => $response->json(),
                        'status' => $response->status(),
                    ], $response->status());

                    dd($response->json());
                }

        }





    public function render()
    {
        return view('livewire.app.ai.gemini')
        ->title('');
    }
}
