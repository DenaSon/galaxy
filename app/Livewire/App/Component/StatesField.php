<?php

namespace App\Livewire\App\Component;

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Mary\Traits\Toast;

class StatesField extends Component
{
    use Toast;
    public $states;
    public $selectedState =1;

    public function mount()
    {
        $this->getStates();
    }

    public function getStates()
    {
        try {
            $response = Http::withHeaders([
                'Token' => config('postex.postex_token')
            ])->get('https://postex.ir/api/state/getState');

            if ($response->successful()) {

                $this->states = collect($response->json())
                    ->map(function ($state) {
                        return [
                            'value' => $state['stateId'],
                            'label' => $state['stateName'],
                        ];
                    });

            } else {

             return false;

            }
        } catch (\Exception $e) {

            return false;
        }
    }

    public function updatedSelectedState($value)
    {
        $this->dispatch('stateChanged', ['stateId' => $this->selectedState]);


    }

    public function render()
    {
        return view('livewire.app.component.states-field');
    }
}
