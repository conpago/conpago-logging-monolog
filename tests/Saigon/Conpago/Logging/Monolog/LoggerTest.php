<?php
	/**
	 * Created by PhpStorm.
	 * User: bartosz.golek
	 * Date: 2014-06-20
	 * Time: 08:08
	 */

	namespace Saigon\Conpago\Logging\Monolog;


	use PHPUnit_Framework_MockObject_MockObject;

	class LoggerTest extends \PHPUnit_Framework_TestCase
	{
		const logMessage = 'xxx';
		private $logContext = array();

		private $loggerInterface;
		private $logger;

		protected function setUp()
		{
			$this->loggerInterface = $this->getMock('Psr\Log\LoggerInterface');
			$this->logger = new Logger($this->loggerInterface);
		}

		function testAddAlert()
		{
			$this->loggerInterface->expects($this->once())->method('alert')->with(self::logMessage, $this->logContext);
			$this->logger->addAlert(self::logMessage, $this->logContext);
		}

		function testAddCritical()
		{
			$this->loggerInterface->expects($this->once())->method('critical')->with(self::logMessage, $this->logContext);
			$this->logger->addCritical(self::logMessage, $this->logContext);
		}

		function testAddDebug()
		{
			$this->loggerInterface->expects($this->once())->method('debug')->with(self::logMessage, $this->logContext);
			$this->logger->addDebug(self::logMessage, $this->logContext);
		}

		function testAddEmergency()
		{
			$this->loggerInterface->expects($this->once())->method('emergency')->with(self::logMessage, $this->logContext);
			$this->logger->addEmergency(self::logMessage, $this->logContext);
		}

		function testAddError()
		{
			$this->loggerInterface->expects($this->once())->method('error')->with(self::logMessage, $this->logContext);
			$this->logger->addError(self::logMessage, $this->logContext);
		}

		function testAddInfo()
		{
			$this->loggerInterface->expects($this->once())->method('info')->with(self::logMessage, $this->logContext);
			$this->logger->addInfo(self::logMessage, $this->logContext);
		}

		function testAddNotice()
		{
			$this->loggerInterface->expects($this->once())->method('notice')->with(self::logMessage, $this->logContext);
			$this->logger->addNotice(self::logMessage, $this->logContext);
		}

		function testAddWarning()
		{
			$this->loggerInterface->expects($this->once())->method('warning')->with(self::logMessage, $this->logContext);
			$this->logger->addWarning(self::logMessage, $this->logContext);
		}
	}
 