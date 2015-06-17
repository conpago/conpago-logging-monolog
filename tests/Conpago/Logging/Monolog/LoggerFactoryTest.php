<?php
	/**
	 * Created by PhpStorm.
	 * User: bartosz.golek
	 * Date: 2014-06-20
	 * Time: 08:31
	 */

	namespace Saigon\Conpago\Logging\Monolog;


	class LoggerFactoryTest extends \PHPUnit_Framework_TestCase
	{
		private $loggerConfig;

		private $loggerFactory;

		protected function setUp()
		{
			$this->loggerConfig = $this->getMock('Saigon\Conpago\Logging\Contract\ILoggerConfig');
			$this->loggerConfig->expects($this->any())->method('getLogFilePath')->willReturn('');
			$this->loggerFactory = new LoggerFactory($this->loggerConfig);
		}

		function testCreateLogger()
		{
			$this->assertInstanceOf('Monolog\Logger', $this->loggerFactory->createLogger());
		}
	}