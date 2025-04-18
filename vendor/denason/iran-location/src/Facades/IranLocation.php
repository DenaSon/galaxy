<?php

namespace Denason\IranLocation\Facades;


use Denason\IranLocation\IranLocationInterface;
use Illuminate\Support\Facades\Facade;

class IranLocation extends Facade
{
    protected static function getFacadeAccessor()
    {
        return IranLocationInterface::class;
    }


}
