<?php

namespace Logger\Targets;

use Logger\Constants\LogLevel;
use Logger\Exceptions\InvalidLogLevelException;

class ConsoleLogTarget implements LogTarget
{
    public function log($level, $msg)
    {
        echo match ($level) {
            LogLevel::DEBUG => "[DEBUG] $msg\n",
            LogLevel::INFO => "[INFO] $msg\n",
            LogLevel::WARNING => "[WARNING] $msg\n",
            LogLevel::ERROR => "[ERROR] $msg\n",
            default => throw new InvalidLogLevelException($level),
        };
    }
}