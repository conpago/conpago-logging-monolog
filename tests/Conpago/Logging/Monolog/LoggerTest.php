<?php
namespace Conpago\Logging\Monolog;

use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use Psr\Log\LoggerInterface;

class LoggerTest extends TestCase
{
    const LOG_MESSAGE = 'xxx';

    private $logContext = array();

    /** @var MockObject | LoggerInterface */
    private $loggerInterfaceMock;

    /** @var Logger */
    private $logger;

    protected function setUp()
    {
        $this->loggerInterfaceMock = $this->createMock(LoggerInterface::class);
        $this->logger = new Logger($this->loggerInterfaceMock);
    }

    public function testAddAlert()
    {
        $this->loggerInterfaceMock
            ->expects($this->once())
            ->method('alert')
            ->with(self::LOG_MESSAGE, $this->logContext);

        $this->logger->addAlert(self::LOG_MESSAGE, $this->logContext);
    }

    public function testAddCritical()
    {
        $this->loggerInterfaceMock
            ->expects($this->once())
            ->method('critical')
            ->with(self::LOG_MESSAGE, $this->logContext);

        $this->logger->addCritical(self::LOG_MESSAGE, $this->logContext);
    }

    public function testAddDebug()
    {
        $this->loggerInterfaceMock
            ->expects($this->once())
            ->method('debug')
            ->with(self::LOG_MESSAGE, $this->logContext);

        $this->logger->addDebug(self::LOG_MESSAGE, $this->logContext);
    }

    public function testAddEmergency()
    {
        $this->loggerInterfaceMock
            ->expects($this->once())
            ->method('emergency')
            ->with(self::LOG_MESSAGE, $this->logContext);

        $this->logger->addEmergency(self::LOG_MESSAGE, $this->logContext);
    }

    public function testAddError()
    {
        $this->loggerInterfaceMock
            ->expects($this->once())
            ->method('error')
            ->with(self::LOG_MESSAGE, $this->logContext);

        $this->logger->addError(self::LOG_MESSAGE, $this->logContext);
    }

    public function testAddInfo()
    {
        $this->loggerInterfaceMock
            ->expects($this->once())
            ->method('info')
            ->with(self::LOG_MESSAGE, $this->logContext);

        $this->logger->addInfo(self::LOG_MESSAGE, $this->logContext);
    }

    public function testAddNotice()
    {
        $this->loggerInterfaceMock
            ->expects($this->once())
            ->method('notice')
            ->with(self::LOG_MESSAGE, $this->logContext);

        $this->logger->addNotice(self::LOG_MESSAGE, $this->logContext);
    }

    public function testAddWarning()
    {
        $this->loggerInterfaceMock
            ->expects($this->once())
            ->method('warning')
            ->with(self::LOG_MESSAGE, $this->logContext);

        $this->logger->addWarning(self::LOG_MESSAGE, $this->logContext);
    }
}
