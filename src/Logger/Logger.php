<?php

namespace Logger;

use Logger\Constants\LogLevel;

class Logger
{
    private mixed $level;
    private array $targets = [];

    /**
     * @param array $targets
     * @param int $level
     */
    public function __construct(array $targets, int $level = LogLevel::DEBUG)
    {
        $this->targets = $targets;
        $this->level = $level;


        foreach ($this->targets as $target) {
            $target->setLevel($this->level);
        }
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
        if ($level < $this->level) {
            return;
        }

        foreach ($this->targets as $target) {
            if ($level >= $target->getLevel()) {
                $target->log($level, $msg);
            }
        }
    }

}