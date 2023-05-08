<?php

namespace Logger\Targets;

use Logger\Constants\LogLevel;

class ApiLogTarget implements LogTargetInterface
{
    private string $endpoint;
    private int $level;


    /**
     * @param int $level
     * @param string $endpoint
     */
    public function __construct(string $endpoint, int $level = LogLevel::DEBUG)
    {
        $this->endpoint = $endpoint;
        $this->level = $level;
    }


    /**
     * @param int $level
     * @param string $msg
     * @return void
     */
    public function log(int $level, string $msg): void
    {
        if ($level < $this->level) {
            return;
        }

        // TODO implementation send $message to server API at $this->endpoint
        echo "API url: $this->endpoint --> request sent: $msg\n";
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     */
    public function setEndpoint(string $endpoint): void
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }


}