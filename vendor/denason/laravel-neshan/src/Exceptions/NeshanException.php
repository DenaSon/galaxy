<?php

namespace Denason\Neshan\Exceptions;

use Exception;
use Throwable;

class NeshanException extends Exception
{
    /**
     * NeshanException constructor.
     *
     * @param string         $message  The error message
     * @param int            $code     The error code (default is 0)
     * @param Throwable|null $previous The previous exception for chaining (optional)
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
