<?php

namespace App\Livewire\App\Shop\SingleInc;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class SendCommentForm extends Component
{
use Toast;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.app.shop.single-inc.send-comment-form')
        ->title('');
    }
}
