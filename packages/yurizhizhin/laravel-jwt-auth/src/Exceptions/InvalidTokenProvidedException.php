<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\Exceptions;

use Exception;
use Throwable;

/**
 * @class InvalidTokenProvidedException
 * @package Yurizhizhin\LaravelJwtAuth\Exceptions
 */
class InvalidTokenProvidedException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "Unable to validate provided token", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}