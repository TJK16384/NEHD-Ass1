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
    $PW = "";   // password
    $PORT = 3333;
    $DB = "TJK_NEHD_Ass1";

    try {
      $SQLconn = new PDO("mysql:host=$SERVER;port=$PORT;dbname=$DB",$USER,$PW);
      // set the PDO error mode to exception:
      $SQLconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully.";
      
      // Use prepared statements to help sanitization
      $Statement = $SQLconn->prepare("SELECT * FROM Data");
      $Statement->execute();
      
      $Statement->setFetchMode(PDO::FETCH_ASSOC);
      $Result = $Statement->fetchAll();
      //print_r(count($Result[0]));
    }
    catch(PDOException $e) {
      echo "ERROR: " . $e->getMessage();
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
          <?php
          for($x=0; $x<count($Result); $x++){
            echo "<tr>";
            echo "<td>" . $x . "</td>";
            for($y=1; $y<count($Result[$x]); $y++){ // ignore first value
              echo "<td>";
              echo array_values($Result[$x])[$y] ;
              echo "</td>";
            }
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    
    <?php
    $SQLconn = null;  // close connection
    ?>
    
  </body>
</html>
