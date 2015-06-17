<?php
	/**
	 * Created by PhpStorm.
	 * User: bartosz.golek
	 * Date: 2014-06-20
	 * Time: 08:02
	 */

	namespace Conpago\Logging\Monolog;


	use Conpago\DI\IContainerBuilder;
	use Conpago\DI\IModule;

	class MonologLoggerModule implements IModule
	{

		public function build(IContainerBuilder $builder)
		{
			$builder
				->registerType('Conpago\Logging\Monolog\LoggerFactory');

			$builder
				->register(function (IContainer $c)
					{
						/** @var LoggerFactory $loggerFactory */
						$loggerFactory = $c->resolve('Conpago\Logging\Monolog\LoggerFactory');

						return $loggerFactory->createLogger();
					})
				->asA('Conpago\Logging\Contract\ILogger');
		}
	}
