<?php 
// CREATE - PHP code block to add an entry to the database
// (heavily borrowed from http://www.w3schools.com/php/php_form_validation.asp)

// Note:  PHP_SELF is var that means "current page"
// htmlspecialchars deals with HTML escape characters, helping sanitize URL mischief
// (as in Johnny-Drop-Table-style exploits)

require "SQL.php";

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
  $name = Sanitize( $_POST["Name"] );
  $phone = Sanitize( $_POST["PhoneNum"] );
  
  $sql = "INSERT INTO Data (name,phone) VALUES (?, ?)";
  try {
    $PDO = DB::Open();
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $Query = $PDO->prepare($sql);
    $Query->execute( array($name,$phone) );
    
    DB::Close();
    header("Location: index.php");
  }
  catch(PDOException $e) {
    echo "&quot;$sql&quot;<br>" . "ERROR: " . $e->getMessage();
  }
}

function Sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
