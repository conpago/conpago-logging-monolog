<?php
namespace Conpago\Logging\Monolog;

use Conpago\Logging\Contract\ILogger;
use Conpago\Logging\Contract\ILoggerConfigProvider;
use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

class LoggerFactory
{
    /** @var ILoggerConfigProvider */
    private $loggerConfigProvider;

    public function __construct(ILoggerConfigProvider $loggerConfigProvider)
    {
        $this->loggerConfigProvider = $loggerConfigProvider;
    }

    /**
     * @return ILogger
     */
    public function createLogger()
    {
        $log = new MonologLogger('application');
        foreach ($this->loggerConfigProvider->getConfigs() as $loggerConfig) {
            $handler = new StreamHandler(
                $loggerConfig->getLogFilePath(),
                $loggerConfig->getLogLevel()
            );
            $handler->setFormatter(new ExceptionLineFormatter());
            $log->pushHandler( $handler );
        }
        return new Logger($log);
    }
}
