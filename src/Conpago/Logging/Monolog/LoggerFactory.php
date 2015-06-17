<?php
	/**
	 * Created by PhpStorm.
	 * User: bartosz.golek
	 * Date: 2014-06-20
	 * Time: 07:42
	 */

	namespace Saigon\Conpago\Logging\Monolog;

	use Monolog\Logger as MonologLogger;
	use Monolog\Handler\StreamHandler;
	use Psr\Log\LoggerInterface;
	use Saigon\Conpago\Logging\Contract\ILoggerConfig;

	class LoggerFactory
	{
		/**
		 * @var ILoggerConfig
		 */
		private $loggerConfig;

		function __construct(ILoggerConfig $loggerConfig)
		{
			$this->loggerConfig = $loggerConfig;
		}

		/**
		 * @return LoggerInterface
		 */
		function createLogger()
		{
			$log = new MonologLogger('application');
			$log->pushHandler(
				new StreamHandler(
					$this->loggerConfig->getLogFilePath(), $this->loggerConfig->getLogLevel()
				)
			);

			return $log;
		}
	}