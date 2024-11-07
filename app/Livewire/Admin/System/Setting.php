<?php

namespace App\Livewire\Admin\System;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\Http;
#[Title('تنظیمات')]
#[Layout('components.layouts.admin')]
class Setting extends Component
{
    use Toast;
    public $website_title;
    public $meta_keywords;
    public $meta_description;
    public $template_color;
    public $tax;
    public $shipping_cost;
    public $admin_email;
    public $admin_phone;
    public $support_phone;
    public $support_email;

    public function mount()
    {

        if (\App\Models\Setting::count() === 0) {
            // Insert default key-value pairs
            \App\Models\Setting::insert([
                ['key' => 'website_title', 'value' => 'My Website'],
                ['key' => 'meta_keywords', 'value' => 'default, keywords, here'],
                ['key' => 'meta_description', 'value' => 'Default meta description'],
                ['key' => 'template_color', 'value' => '#FFFFFF'],
                ['key' => 'tax', 'value' => '10'], // Example tax percentage
                ['key' => 'shipping_cost', 'value' => '5.00'], // Example shipping cost
                ['key' => 'admin_email', 'value' => 'admin@example.com'],
                ['key' => 'admin_phone', 'value' => '+1234567890'],
                ['key' => 'support_phone', 'value' => '+0987654321'],
                ['key' => 'support_email', 'value' => 'support@example.com'],
            ]);
        }

        $settings = \App\Models\Setting::all()->pluck('value', 'key');

        $this->website_title = $settings['website_title'] ?? '';
        $this->meta_keywords = $settings['meta_keywords'] ?? '';
        $this->meta_description = $settings['meta_description'] ?? '';
        $this->template_color = $settings['template_color'] ?? '';
        $this->tax = $settings['tax'] ?? '';
        $this->shipping_cost = $settings['shipping_cost'] ?? '';
        $this->admin_email = $settings['admin_email'] ?? '';
        $this->admin_phone = $settings['admin_phone'] ?? '';
        $this->support_phone = $settings['support_phone'] ?? '';
        $this->support_email = $settings['support_email'] ?? '';



    }

    public function saveMainSetting(): void
    {
        $settingsData = [
            'website_title' => $this->website_title,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'template_color' => $this->template_color,

        ];

        foreach ($settingsData as $key => $value) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

       $this->info('تنظیمات ذخیره شد');

    }

    public function saveShopSetting(): void
    {
        $settingsData = [
            'tax' => $this->tax,
            'shipping_cost' => $this->shipping_cost,


        ];

        foreach ($settingsData as $key => $value) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $this->info('تنظیمات ذخیره شد');
    }


    public function saveContactSetting(): void
    {
        $settingsData = [
            'admin_email' => $this->admin_email,
            'admin_phone' => $this->admin_phone,
            'support_phone' => $this->support_phone,
            'support_email' => $this->support_email,

        ];

        foreach ($settingsData as $key => $value) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $this->info('تنظیمات ذخیره شد');
    }

    public function render()
    {

        return view('livewire.admin.system.setting')
            ->title('تنظیمات ');
    }
}
