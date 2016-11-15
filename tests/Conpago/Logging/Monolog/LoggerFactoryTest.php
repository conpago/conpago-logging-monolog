<?php
	/**
	 * Created by PhpStorm.
	 * User: bartosz.golek
	 * Date: 2014-06-20
	 * Time: 08:31
	 */

	namespace Conpago\Logging\Monolog;


	use Conpago\Logging\Contract\ILogger;
    use Conpago\Logging\Contract\ILoggerConfig;
    use Conpago\Logging\Contract\ILoggerConfigProvider;

    class LoggerFactoryTest extends \PHPUnit_Framework_TestCase
	{
		private $loggerConfigProvider;

		private $loggerConfig;

		private $loggerFactory;

		protected function setUp()
		{
			$this->loggerConfig = $this->createMock(ILoggerConfig::class);
			$this->loggerConfig->expects($this->any())->method('getLogFilePath')->willReturn('');
			$this->loggerConfigProvider = $this->createMock(ILoggerConfigProvider::class);
			$this->loggerConfigProvider->expects($this->any())->method('getConfigs')->willReturn([$this->loggerConfig]);

			$this->loggerFactory = new LoggerFactory($this->loggerConfigProvider);
		}

		function testCreateLogger()
		{
			$this->assertInstanceOf(ILogger::class, $this->loggerFactory->createLogger());
		}
	}
