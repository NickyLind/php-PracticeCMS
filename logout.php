<?php 

require 'includes/init.php';

// clear session global variable
$_SESSION = array();

// checks to see if there are session cookies, and if so, remove session cookie from the browser
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 4200,
    $params["path"], $params['domain'], $params['secure'], $params['httponly']
  );
}

session_destroy();

Url::redirect('/Demo/index.php');

?>