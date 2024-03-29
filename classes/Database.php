<?php 

/**
 * Databse
 * 
 * A connection to the database
 */
class Database
{
  /**
   * Hostname
   * 
   * @var string
   */
  protected $db_host;

  /**
   * Database name
   * 
   * @var string
   */
  protected $db_name;

  /**
   * Username
   * 
   * @var string
   */
  protected $db_user;

  /**
   * Password
   * 
   * @var string
   */
  protected $db_password;


  /**
   * Constructor
   * 
   * @param string $host Hostname
   * @param string $name DB name
   * @param string $user Username
   * @param string $password Password
   * 
   * @return void
   */
  public function __construct($host, $name, $user, $password)
  {
    $this->db_host = $host;
    $this->db_name = $name;
    $this->db_user = $user;
    $this->db_password = $password;
  }
  /**
   * Get the database connection
   * 
   * @return PDO (PHP Data Object) Connection to the database server
   */
  public function getConn()
  {
    $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=utf8';

    try {
      $db =  new PDO($dsn, $this->db_user, $this->db_password);

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $db;
    } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }
}