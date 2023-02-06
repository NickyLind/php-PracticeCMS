<?php

/**
 * Initializations
 * 
 * Register and autoloader, start or resume the session etc.
 */

spl_autoload_register(function($class) {
  require dirname(__DIR__) . "/classes/{$class}.php";
});

session_start();

require dirname(__DIR__) . '/config.php';

function errorHandler($level, $message, $file, $line)
{
  throw new ErrorException($message, 0, $level, $file, $line);
}

function exceptionHandler($exception)
{
  http_response_code(500);

  if(SHOW_ERROR_DETAIL) {
    echo sprintf(
      '<h1>An Error Occurred</h1>
      <p>Uncaught exception: %1$s</p>
      <p>%2$s</p>
      <p>Stack Trace: <pre>%3$s</pre></p>
      <p>In file %4$s on line %5$s</p>',
      get_class($exception),
      $exception->getMessage(),
      $exception->getTraceAsString(),
      $exception->getFile(),
      $exception->getLine()
    );
    exit();
  } else {
    echo '<h1>An error occurred</h1>';
    echo '<p>Please try again later.</p>';
  }
}

set_error_handler('errorHandler');
set_exception_handler('exceptionHandler');