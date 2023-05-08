<?php

namespace tests;


use Logger\Constants\LogLevel;
use Logger\Logger;
use Logger\Targets\ApiLogTarget;
use Logger\Targets\ConsoleLogTarget;
use Logger\Targets\EmailLogTarget;
use PHPUnit\Framework\TestCase;


class LoggerTest extends TestCase
{
    public function testDummy()
    {
        $string1 = "rubin";
        $string2 = "rubin";
        $this->assertEquals($string1, $string2);
    }


    public function testLevelDebug()
    {
        $consoleTarget = new ConsoleLogTarget();
        $logger = new Logger([$consoleTarget], LogLevel::WARNING);
        $logger->warning("warning log");

        $consoleTargetMock = new ConsoleLogTarget();
        $consoleTargetMock->setLevel(2);
        $consoleTargetMock->log(2, "warning log");

        $this->assertEquals($consoleTarget, $consoleTargetMock);
    }

    public function testFunctionalityOfLogLevelByTarget()
    {
        $apiTarget = new ApiLogTarget('http://test.com/api/logs',);
        $emailTarget = new EmailLogTarget('admin@example.com', 'admin@example.com');
        $consoleTarget = new ConsoleLogTarget();

        $logger = new Logger([$apiTarget, $emailTarget, $consoleTarget], LogLevel::DEBUG);

        // Configure levels per target
        $apiTarget->setLevel(LogLevel::ERROR);
        $emailTarget->setLevel(LogLevel::WARNING);

        $this->assertEquals(LogLevel::ERROR, $apiTarget->getLevel());
        $this->assertEquals(LogLevel::WARNING, $emailTarget->getLevel());

        $logger->debug('Log debug');
        $logger->info('Log info');
        $logger->warning('Log warning');
        $logger->error('Log error');

        // Reset levels to DEBUG
        $apiTarget->setLevel(LogLevel::DEBUG);
        $emailTarget->setLevel(LogLevel::DEBUG);

        $logger->debug('Log debug -> visible by evreyone');

        $this->assertEquals(LogLevel::DEBUG, $apiTarget->getLevel());
        $this->assertEquals(LogLevel::DEBUG, $emailTarget->getLevel());
    }
}