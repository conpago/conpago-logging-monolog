<?php
	/**
	 * Created by PhpStorm.
	 * User: Bartosz Gołek
	 * Date: 27.11.13
	 * Time: 19:19
	 */

	namespace Conpago\Logging\Monolog;

	use Psr\Log\LoggerInterface;
	use Conpago\Logging\Contract\ILogger;

	class Logger implements ILogger
	{
		/**
		 * @var LoggerInterface
		 */
		private $logger;

		/**
		 * @param LoggerInterface $logger
		 */
		function __construct(LoggerInterface $logger)
		{
			$this->logger = $logger;
		}

		function addDebug($message, array $context = array())
		{
			$this->logger->debug($message, $context);
		}

		function addInfo($message, array $context = array())
		{
			$this->logger->info($message, $context);
		}

		function addNotice($message, array $context = array())
		{
			$this->logger->notice($message, $context);
		}

		function addWarning($message, array $context = array())
		{
			$this->logger->warning($message, $context);
		}

		function addError($message, array $context = array())
		{
			$this->logger->error($message, $context);
		}

		function addCritical($message, array $context = array())
		{
			$this->logger->critical($message, $context);
		}

		function addAlert($message, array $context = array())
		{
			$this->logger->alert($message, $context);
		}

		function addEmergency($message, array $context = array())
		{
			$this->logger->emergency($message, $context);
		}
	}
