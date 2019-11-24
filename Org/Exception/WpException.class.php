<?php
namespace Org\Exception;

class WpException extends \Exception
{
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        
        $errors = $message;
        $waitSecond = 3;

        include __ROOT . '/Org/Tpl/Redirect/errors.php';

        exit();
    }
}