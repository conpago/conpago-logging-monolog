<?php
	/**
	 * Created by PhpStorm.
	 * User: bartosz.golek
	 * Date: 2014-06-20
	 * Time: 08:31
	 */

	namespace Conpago\Logging\Monolog;


	class LoggerFactoryTest extends \PHPUnit_Framework_TestCase
	{
		private $loggerConfigProvider;

		private $loggerConfig;

		private $loggerFactory;

		protected function setUp()
		{
			$this->loggerConfig = $this->getMock('Conpago\Logging\Contract\ILoggerConfig');
			$this->loggerConfig->expects($this->any())->method('getLogFilePath')->willReturn('');
			$this->loggerConfigProvider = $this->getMock('Conpago\Logging\Contract\ILoggerConfigProvider');
			$this->loggerConfigProvider->expects($this->any())->method('getConfigs')->willReturn([$this->loggerConfig]);

			$this->loggerFactory = new LoggerFactory($this->loggerConfigProvider);
		}

		function testCreateLogger()
		{
			$this->assertInstanceOf('Conpago\Logging\Contract\ILogger', $this->loggerFactory->createLogger());
		}
	}
