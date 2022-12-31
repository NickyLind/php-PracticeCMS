<?php 

/**
 * Authentication
 * 
 * Login and logout
 */
class Auth 
{
  /**
 * Return the user authentication status
 * 
 * @return boolean true, if a user is logged in, false otherwise
 */
  public static function isLoggedIn() 
  {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
  }

  /**
   * Require the user to be logged in, stopping with an unauthorized message if not
   * 
   * @return void
   */
  public static function requireLogin(){
    if (!static::isLoggedIn()) {
      die('unauthorized');
    }
  }

  /**
   * Log in using the session
   * 
   * @return void
   * ?local is NickyLind - secret?
   */
  public static function login()
  {
    //! regenerates new session ID to help prevent CSS attacks/session fixation attacks
    session_regenerate_id(true);
    $_SESSION['is_logged_in'] = true;
  }

  /**
   * Log out using the session
   * 
   * @reutrn void
   */
  public static function logout()
  {
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
  }
}
