<?php

namespace Logger\Exceptions;

use InvalidArgumentException;

class InvalidLogLevelException extends InvalidArgumentException
{
    /**
     * @param string $level
     */
    public function __construct(string $level)
    {
        parent::__construct("Invalid log level: $level");
    }
}