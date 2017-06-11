<?php
namespace Conpago\Logging\Monolog;

use Psr\Log\LoggerInterface;
use Conpago\Logging\Contract\ILogger;

class Logger implements ILogger
{
    /** @var LoggerInterface */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function addDebug($message, array $context = [])
    {
        $this->logger->debug($message, $context);
    }

    public function addInfo($message, array $context = [])
    {
        $this->logger->info($message, $context);
    }

    public function addNotice($message, array $context = [])
    {
        $this->logger->notice($message, $context);
    }

    public function addWarning($message, array $context = [])
    {
        $this->logger->warning($message, $context);
    }

    public function addError($message, array $context = [])
    {
        $this->logger->error($message, $context);
    }

    public function addCritical($message, array $context = [])
    {
        $this->logger->critical($message, $context);
    }

    public function addAlert($message, array $context = [])
    {
        $this->logger->alert($message, $context);
    }

    public function addEmergency($message, array $context = [])
    {
        $this->logger->emergency($message, $context);
    }
}
