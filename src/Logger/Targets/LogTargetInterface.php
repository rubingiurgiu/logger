<?php

namespace Logger\Targets;

interface LogTargetInterface
{
    /**
     * @param int $level
     * @param string $msg
     * @return void
     */
    public function log(int $level, string $msg): void;

    /**
     * @param int $level
     * @return void
     */
    public function setLevel(int $level): void;


}