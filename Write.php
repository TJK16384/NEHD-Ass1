<?php 
// WRITE - Single PHP code block to change the database
// (heavily borrowed from http://www.w3schools.com/php/php_form_validation.asp)

/*
 *  FYIs:PHP_SELF is var that means "current page"
 *  htmlspecialchars deals with HTML escape characters, helping sanitize URL mischief
 *  (as in Johnny-Drop-Table-style exploits)
 */

include "SQL.php";

function Sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ( $_SERVER["REQUEST_METHOD"] == "POST" )
{
  try {
    $PDO = DB::Open();
    
    switch( $_POST["Action"] )
    {
      case "CREATE": {
        $name = Sanitize( $_POST["Name"] );
        $phone = Sanitize( $_POST["PhoneNum"] );
        
        $Query = $PDO->prepare( "INSERT INTO Data (name,phone) VALUES (?,?)" );
        $Query->execute( array($name,$phone) );
        
        break;
      }
      case "UPDATE": {
        $id = $_POST["ID"];
        $name = Sanitize( $_POST["Name"] );
        $phone = Sanitize( $_POST["PhoneNum"] );
        
        $Query = $PDO->prepare( "UPDATE Data SET name=?, phone=? WHERE id=?" );
        $Query->execute( array($name,$phone,$id) );
        
        break;
      }
      case "DELETE": {
        $Query = $PDO->prepare( "DELETE FROM Data WHERE id=?" );
        //$Query->bindParam(":ID", $_POST["ID"]);
        $Query->execute( array($_POST["ID"]) );
        break;
      }
      default: {
        echo "wtf no, that's not a valid action the server can take, lulz  XD";
      }
    }
    
    DB::Close();
  }
  catch(PDOException $e) {
    echo '<script>alert("ERROR: ' . $e->getMessage() . '");</script>';
  }
}

//header("Location: ./"); // redirect to home when done

?>
