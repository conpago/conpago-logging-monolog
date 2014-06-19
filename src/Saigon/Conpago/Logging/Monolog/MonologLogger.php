<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Gołek
 * Date: 27.11.13
 * Time: 19:19
 */

namespace Saigon\Conpago\Logging\Monolog;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Saigon\Conpago\Logging\Contract\ILogger;
use Saigon\Conpago\Logging\Contract\ILoggerConfig;

class MonologLogger implements ILogger
{
	/**
	 * @var ILoggerConfig
	 */
	private $loggerConfig;

	/**
	 * @var Logger
	 */
	private $log;

	/**
	 * @param ILoggerConfig $loggerConfig
	 */
	function __construct(ILoggerConfig $loggerConfig)
	{
		$this->loggerConfig = $loggerConfig;
		// create a log channel
		$this->log = new Logger('application');
		$this->log->pushHandler(
			new StreamHandler(
				$this->loggerConfig->getLogFilePath(),
				$this->loggerConfig->getLogLevel()));
	}

	function addDebug($message, array $context = array())
	{
		$this->log->addDebug($message, $context);
	}

	function addInfo($message, array $context = array())
	{
		$this->log->addInfo($message, $context);
	}

	function addNotice($message, array $context = array())
	{
		$this->log->addNotice($message, $context);
	}

	function addWarning($message, array $context = array())
	{
		$this->log->addWarning($message, $context);
	}

	function addError($message, array $context = array())
	{
		$this->log->addError($message, $context);
	}

	function addCritical($message, array $context = array())
	{
		$this->log->addCritical($message, $context);
	}

	function addAlert($message, array $context = array())
	{
		$this->log->addAlert($message, $context);
	}

	function addEmergency($message, array $context = array())
	{
		$this->log->addEmergency($message, $context);
	}
}