<?php

use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;


Route::prefix('master')->as('master.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');


    Route::prefix('blog')->as('blog.')->group(function () {

    });
});

