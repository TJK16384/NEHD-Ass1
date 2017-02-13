<?php
// 2017/02/13: redone in object-oriented format
// Credit: https://www.startutorial.com/articles/view/php-crud-tutorial-part-1

class DB
{
  // Initial steps for connecting to database:
  private static $Schema = "TJK_NEHD_Ass1";
  private static $Host = "localhost";
  private static $User = "root";
  private static $PW = "";   // password
  private static $Port = 3333;
  
  private static $Connection = NULL;
  
  public function __construct() {
    print("Init disallowed - this is a static class, bro.  :|");
  }
  
  public function Open() {
    if(NULL == self::$Connection) {
      try {
        self::$Connection = new PDO("mysql:host=" . self::$Host . ";port=" . self::$Port . ";dbname=" . self::$Schema, self::$User, self::$PW);
        // set the PDO error mode to exception:
        self::$Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected.";
      }
      catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage();
      }
    }
    return self::$Connection;
  }
  
  public function Close() {
    self::$Connection =  NULL;
  }
}
?>