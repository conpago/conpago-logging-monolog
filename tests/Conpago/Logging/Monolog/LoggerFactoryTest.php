<?php
namespace Conpago\Logging\Monolog;

use Conpago\Logging\Contract\ILogger;
use Conpago\Logging\Contract\ILoggerConfig;
use Conpago\Logging\Contract\ILoggerConfigProvider;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

class LoggerFactoryTest extends TestCase
{
    /** @var MockObject | ILoggerConfigProvider */
    private $loggerConfigProviderMock;

    /** @var MockObject | ILoggerConfig */
    private $loggerConfigMock;

    /** @var LoggerFactory */
    private $loggerFactory;

    protected function setUp()
    {
        $this->loggerConfigMock = $this->createMock(ILoggerConfig::class);
        $this->loggerConfigMock->    method('getLogFilePath')->willReturn('');
        $this->loggerConfigProviderMock = $this->createMock(ILoggerConfigProvider::class);
        $this->loggerConfigProviderMock->    method('getConfigs')->willReturn([$this->loggerConfigMock]);

        $this->loggerFactory = new LoggerFactory($this->loggerConfigProviderMock);
    }

    public function testCreateLogger()
    {
        $this->assertInstanceOf(ILogger::class, $this->loggerFactory->createLogger());
    }
}
