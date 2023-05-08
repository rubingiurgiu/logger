# logger

E.g. of usage:

        $apiTarget = new ApiLogTarget('http://test.com/api/logs',);
        $emailTarget = new EmailLogTarget('admin@example.com', 'admin@example.com');
        $consoleTarget = new ConsoleLogTarget();

        $logger = new Logger([$apiTarget, $emailTarget, $consoleTarget], LogLevel::DEBUG);

        // Configure levels per target
        $apiTarget->setLevel(LogLevel::ERROR);
        $emailTarget->setLevel(LogLevel::WARNING);

        $logger->debug('Log debug -> visible by console targe');
        $logger->info('Log info -> visible by console target');
        $logger->warning('Log warning -> visible by email, console targets');
        $logger->error('Log error -> visible by everyrone');

        // Reset levels to DEBUG
        $apiTarget->setLevel(LogLevel::DEBUG);
        $emailTarget->setLevel(LogLevel::DEBUG);

        $logger->debug('Log debug -> visible by evreyone');
