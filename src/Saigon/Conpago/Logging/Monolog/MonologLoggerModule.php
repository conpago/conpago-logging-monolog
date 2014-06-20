<?php
	/**
	 * Created by PhpStorm.
	 * User: bartosz.golek
	 * Date: 2014-06-20
	 * Time: 08:02
	 */

	namespace Saigon\Conpago\Logging\Monolog;


	use Saigon\Conpago\DI\IContainerBuilder;
	use Saigon\Conpago\IModule;

	class MonologLoggerModule implements IModule
	{

		public function build(IContainerBuilder $builder)
		{
			$builder
				->registerType('Saigon\Conpago\Logging\Monolog\LoggerFactory');

			$builder
				->register(function (IContainer $c)
					{
						/** @var LoggerFactory $loggerFactory */
						$loggerFactory = $c->resolve('Saigon\Conpago\Logging\Monolog\LoggerFactory');

						return $loggerFactory->createLogger();
					})
				->asA('Saigon\Conpago\Logging\Contract\ILogger');
		}
	}