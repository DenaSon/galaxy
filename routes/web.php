<?php

use Livewire\Volt\Volt;

Volt::route('/', \App\Livewire\Admin\Dashboard::class);
Volt::route('/master',\App\Livewire\Admin\Dashboard::class)->name('master');
