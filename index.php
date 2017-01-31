<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <title>Assignment 1: Basic PHP CRUD</title>
    
    <!-- <link rel="stylesheet" href="./css/normalize.min.css" /> -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    
    <script src="./js/jquery.slim.min.js"></script>
    <script src="./js/tether.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </head>
  
  <body>
    
    <h1>Assignment 1: Basic PHP CRUD</h1>
    
<?php
// Connect to server
$SERVER = "localhost";
$USER = "root";
$PW = "";
$PORT = 3333;
$DB = "TJK_NEHD_Ass1";

try {
  $conn = new PDO("mysql:host=$SERVER;port=$PORT;dbname=$DB",$USER,$PW);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully.";
}
catch(PDOException $e)
{
  echo "COULD NOT CONNECT: " . $e->getMessage();
}
?>
    
    <h2>SQL Data:</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone #</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Joe Schmoe</td>
            <td>5192220160</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Joe Schmoe</td>
            <td>5192220160</td>
          </tr>
        </tbody>
      </table>
    </div>
    
  </body>
</html>
