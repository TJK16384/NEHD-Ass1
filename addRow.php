<?php 
// addRow - PHP code block to add an entry to the database
// (heavily borrowed from http://www.w3schools.com/php/php_form_validation.asp)

// PHP_SELF is var that means "current page"
// htmlspecialchars sanitizes potential URL mischief
// (as in Johnny-Drop-Table-style haxx)

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
  $name = Sanitize( $_POST["Name"] );
  $phone = Sanitize( $_POST["PhoneNum"] );
  
  $sql = "INSERT INTO Data (name,phone) VALUES ('$name','$phone')";
  try {
    $SQLconn->exec($sql);
    //echo "<script></script>";
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
