<?php

namespace Framework\Exception;

use Exception;
use Throwable;

class ControllerNotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
