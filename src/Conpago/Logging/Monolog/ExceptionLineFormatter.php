<?php
namespace Conpago\Logging\Monolog;

use Exception;
use Monolog\Formatter\LineFormatter;

class ExceptionLineFormatter extends LineFormatter
{
    /**
     * @param Exception $exception
     *
     * @return string
     */
    protected function normalizeException($exception)
    {
        return 'Message: ' . $exception->getMessage() .
               'Stack Trace: '. $exception->getTraceAsString();
    }
}
