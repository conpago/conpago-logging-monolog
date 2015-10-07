<?php
	/**
	 * Created by PhpStorm.
	 * User: bartosz.golek
	 * Date: 2014-06-20
	 * Time: 07:42
	 */

	namespace Conpago\Logging\Monolog;

	use Conpago\Logging\Contract\ILogger;
	use Conpago\Logging\Contract\ILoggerConfigProvider;
	use Monolog\Logger as MonologLogger;
	use Monolog\Handler\StreamHandler;
	use Conpago\Logging\Contract\ILoggerConfig;

	class LoggerFactory
	{
		/**
		 * @var ILoggerConfigProvider
		 */
		private $loggerConfig;

		function __construct(ILoggerConfigProvider $loggerConfigProvider)
		{
			$this->loggerConfigProvider = $loggerConfigProvider;
		}

		/**
		 * @return ILogger
		 */
		function createLogger() {
			$log = new MonologLogger('application');
			foreach ($this->loggerConfigProvider->getConfigs() as $loggerConfig) {
				$handler = new StreamHandler(
						$loggerConfig->getLogFilePath(),
						$loggerConfig->getLogLevel()
				);
				$handler->setFormatter( new ExceptionLineFormatter() );
				$log->pushHandler( $handler );
			}
			return new Logger($log);
		}
	}
