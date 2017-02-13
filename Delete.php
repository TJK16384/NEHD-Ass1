<?php
// DELETE - drop a row from the database

require "SQL.php";

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
  try {
    $PDO = DB::Open();
    
    $Query = $PDO->prepare("DELETE FROM Data WHERE id=?");
    //$Query->bindParam(":ID", $_POST["ID"]);
    $Query->execute( array($_POST["ID"]) );
    
    DB::Close();
    header("Location: index.php");
  }
  catch(PDOException $e) {
    echo "&quot;$sql&quot;<br>" . "ERROR: " . $e->getMessage();
  }
}
?>
