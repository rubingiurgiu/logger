<?php

namespace Logger\Targets;

use Logger\Constants\LogLevel;

class EmailLogTarget implements LogTargetInterface
{
    private string $to;
    private string $from;
    private int $level;

    /**
     * @param string $to
     * @param string $from
     * @param int $level
     */
    public function __construct(string $to, string $from, int $level = LogLevel::ERROR)
    {
        $this->to = $to;
        $this->from = $from;
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

        // TODO implemantaion send e-mail to $this->to with $msg

        echo "E-mail from: $this->from to: $this->to--> was sent: $msg\n";
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