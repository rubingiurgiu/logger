<?php

namespace tests;

use Logger\Constants\LogLevel;
use Logger\Logger;
use Logger\Targets\ConsoleLogTarget;
use PHPUnit\Framework\TestCase;


class LoggerTest extends TestCase
{
    public function testDummy()
    {
        $string1 = "rubin";
        $string2 = "rubin";
        $this->assertEquals($string1, $string2);
    }


    public function testRubin()
    {
        $consoleTarget = new ConsoleLogTarget();
        $logger = new Logger([$consoleTarget], LogLevel::WARNING);
        $logger->warning("warning log");

        $consoleTargetMock = new ConsoleLogTarget();
        $consoleTargetMock->log(2, "warning log");

        $this->assertEquals($consoleTarget, $consoleTargetMock);
    }
}