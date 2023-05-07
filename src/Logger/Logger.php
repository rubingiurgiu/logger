<?php

namespace Logger;


use Logger\Constants\LogLevel;

class Logger
{
    private mixed $minLogLevel = LogLevel::DEBUG;
    private array $targets = [];

    /**
     * @param array $targets
     * @param int $minLogLevel
     */
    public function __construct(array $targets, int $minLogLevel = LogLevel::DEBUG)
    {
        $this->targets = $targets;
        $this->minLogLevel = $minLogLevel;
    }

    /**
     * @param $msg
     * @return void
     */
    public function debug($msg): void
    {
        $this->log(LogLevel::DEBUG, $msg);
    }

    /**
     * @param $msg
     * @return void
     */
    public function info($msg): void
    {
        $this->log(LogLevel::INFO, $msg);
    }

    /**
     * @param $msg
     * @return void
     */
    public function warning($msg): void
    {
        $this->log(LogLevel::WARNING, $msg);
    }

    /**
     * @param $msg
     * @return void
     */
    public function error($msg): void
    {
        $this->log(LogLevel::ERROR, $msg);
    }

    /**
     * @param $level
     * @param $msg
     * @return void
     */
    private function log($level, $msg): void
    {
        if ($level >= $this->minLogLevel) {
            foreach ($this->targets as $target) {
                $target->log($level, $msg);
            }
        }
    }
}