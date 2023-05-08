<?php

namespace Logger\Targets;

use Logger\Constants\LogLevel;
use Logger\Exceptions\InvalidLogLevelException;

class ConsoleLogTarget implements LogTargetInterface
{
    private int $level;

    public function __construct(int $level = LogLevel::DEBUG)
    {
        $this->level = $level;
    }


    /**
     * @param int $level
     * @param string $msg
     * @return void
     */
    public function log(int $level, string $msg): void
    {
        echo match ($level) {
            LogLevel::DEBUG => "Console: [DEBUG] $msg\n",
            LogLevel::INFO => "Console: [INFO] $msg\n",
            LogLevel::WARNING => "Console: [WARNING] $msg\n",
            LogLevel::ERROR => "Console: [ERROR] $msg\n",
            default => throw new InvalidLogLevelException($level),
        };
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getLevel(): int
    {
        return $this->level;
    }
}