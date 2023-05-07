<?php

namespace Logger\Targets;

interface LogTarget
{
    public function log($level, $msg);
}