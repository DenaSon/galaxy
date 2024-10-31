<?php

namespace App\Livewire\Admin\Template;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('components.layouts.admin')]
class MultiSidebar extends Component
{



    public function save()
    {
       //        $this->validate(
       //            [''=>'']
       //        );
    }

    public function mount()
    {

    }


    public function render()
    {
        return view('livewire.admin.template.multi-sidebar')
        ->title('');
    }
}
