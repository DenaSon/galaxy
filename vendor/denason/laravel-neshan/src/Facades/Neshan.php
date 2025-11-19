<?php

namespace Denason\Neshan\Facades;

use Denason\Neshan\NeshanManager;
use Illuminate\Support\Facades\Facade;

class Neshan extends Facade
{
    protected static function getFacadeAccessor()
    {
        return NeshanManager::class;
    }
}
