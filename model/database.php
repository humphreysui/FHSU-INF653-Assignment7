<?php 
  class Database{

    private static $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    private static $username = 'root';
    private static $password = 'sesame'; 
    private static $db;

    private function __construct(){}

    public static function getDB(){
      if(!isset(self::$db)){
        try{
          self::$db = new PDO (self::$dsn, self::$username, self::$password); 
        }catch (PDOException $e){
          $errorMessage = 'Database Error: ';
          $errorMessage .= $e->getMessage();
          include('./view/error.php');
          exit();
        }
      }
      return self::$db;
    }
  }

  //InfinityFree info

  /*
  private static $dsn = 'mysql:host=sql300.epizy.com;dbname=epiz_28276835_zippyusedautos';
  private static $username = 'epiz_28276835';
  private static $password = 'BeVL0A9fs2Rfqxi'; 
  private static $db;
  */

 