<?php
use Denason\Neshan\NeshanManager;

if (!function_exists('neshan')) {
    /**
     * Get the NeshanManager instance.
     *
     * @return NeshanManager
     */
    function neshan(): NeshanManager
    {
        return app(NeshanManager::class);
    }
}

