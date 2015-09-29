<?php
	/**
	 * Created by PhpStorm.
	 * User: bartosz.golek
	 * Date: 2014-06-20
	 * Time: 07:42
	 */

	namespace Conpago\Logging\Monolog;

	use Conpago\Logging\Contract\ILogger;
	use Monolog\Logger as MonologLogger;
	use Monolog\Handler\StreamHandler;
	use Conpago\Logging\Contract\ILoggerConfig;

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
		 * @return ILogger
		 */
		function createLogger()
		{
			$log = new MonologLogger('application');
			$handler = new StreamHandler(
					$this->loggerConfig->getLogFilePath(),
					$this->loggerConfig->getLogLevel()
			);
			$handler->setFormatter(new ExceptionLineFormatter());
			$log->pushHandler($handler);

			return new Logger($log);
		}
	}
