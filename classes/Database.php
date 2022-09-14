<?php 

/**
 * Databse
 * 
 * A connection to the database
 */
class Database
{

  /**
   * Get the database connection
   * 
   * @return PDO (PHP Data Object) Connection to the database server
   */
  public function getConn()
  {
    $db_host = "localhost";
    $db_name = "cms";
    $db_user = "nickylind";
    $db_password = "uev6!vtWDa4)27a(";

    $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';

    return new PDO($dsn, $db_user, $db_password);
  }
}


?>