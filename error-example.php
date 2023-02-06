<?php 
//! doesn't work for 1/0 in this version of php
// function errorHandler($level, $message, $file, $line)
// {
//   echo 'Caught error: ', $message;
// }
// set_error_handler('errorHandler');

function exceptionHandler($exception)
{
  echo 'Caught exception: ', $exception->getMessage();
}
set_exception_handler('exceptionHandler');

$i = 1 / 0;

?>