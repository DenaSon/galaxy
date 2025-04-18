<?php

use Denason\IranLocation\IranLocationInterface;

if (! function_exists('iranLocation')) {
    function iranLocation(): IranLocationInterface
    {
        return app(IranLocationInterface::class);
    }
}
