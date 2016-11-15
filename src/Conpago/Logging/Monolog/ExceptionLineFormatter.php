<?php
	/**
	 * Created by PhpStorm.
	 * User: bg
	 * Date: 29.09.15
	 * Time: 18:45
	 */

	namespace Conpago\Logging\Monolog;

	use Monolog\Formatter\LineFormatter;

	class ExceptionLineFormatter extends LineFormatter
	{
		protected function normalizeException($e)
		{
			return 'Message: ' . $e->getMessage() .
			       'Stack Trace: '. $e->getTraceAsString();
		}
	}