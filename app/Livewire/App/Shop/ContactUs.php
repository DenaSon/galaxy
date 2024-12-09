<?php

namespace App\Livewire\App\Shop;

use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class ContactUs extends Component
{
    use Toast;
    public $name;
    public $email;
    public $phone;
    public $text;


    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'required|numeric',
            'text' => 'required|max:255|min:3',

        ]);

        $supportMail = getSetting('support_mail') ?? 'support@denapax.com';
        // Send the email
        Mail::to($supportMail)->send(new ContactUsMail($this->name, $this->email, $this->phone, $this->text));

        $this->info('پیام شما ارسال شد','بزودی کارشناسان دناپکس با شما تماس خواهند گرفت',css: 'text-white bg-primary');

        $this->reset();

    }


    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.app.shop.contact-us')
            ->title('تماس باما | دناپکس');
    }
}
