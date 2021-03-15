<?php
  /**
   * DATABASE MODEL
   */
  class DataBase {
    private static $user = 'hughesbu_bryan_hughes';
    private static $password = 'xsSt(3rtE2uk$y';
    private static $dsn = "mysql:host=167.114.195.192;dbname=hughesbu_PHP_LAB06";
    private static $dbConn;

    private function __construct()
    {
    }

    /**
     * ESTABLISH PDO CONNECTION
     */
    public static function getDB() {
      //If there is no connection:
      if(!isset(self::$dbConn)) {
        //Try connecting with these credentials
        try {
          self::$dbConn = new \PDO(self::$dsn, self::$user, self::$password);
          self::$dbConn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
          self::$dbConn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
          //If there's an error thrown, Capture the msg and exit the attempt.
        } catch (PDOException $exception) {
          $outMsg = $exception->getMessage();
          echo $outMsg;
          exit();
        }
      }
      return self::$dbConn;
    }
  }
?>