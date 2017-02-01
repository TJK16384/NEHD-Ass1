<?php
// Connect to server
$SERVER = "localhost";
$USER = "root";
$PW = "";   // password
$PORT = 3333;
$DB = "TJK_NEHD_Ass1";

try {
  $SQLconn = new PDO("mysql:host=$SERVER;port=$PORT;dbname=$DB", $USER, $PW);
  // set the PDO error mode to exception:
  $SQLconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully.";
  
  // Use prepared statements to help sanitization
  $Statement = $SQLconn->prepare("SELECT * FROM Data");
  $Statement->execute();
  
  $Statement->setFetchMode(PDO::FETCH_ASSOC);
  $Result = $Statement->fetchAll(); // fetches, essentially, JSON format
  //print_r(count($Result[0]));
}
catch(PDOException $e) {
  echo "ERROR: " . $e->getMessage();
}

for($x=0; $x<count($Result); $x++) {
  echo "<tr>";
  //echo "<td>" . $x . "</td>";
  for($y=0; $y<count($Result[$x]); $y++) {
    echo "<td>";
    echo array_values($Result[$x])[$y] ;
    echo "</td>";
  }
  echo "<td class='Change'>";
  echo "<button type='button' class='btn btn-success'>Add</button>";
  echo "<button type='button' class='btn btn-warning'>Change</button>";
  echo "<button type='button' class='btn btn-danger'>Delete</button>";
  echo "</td>";
  echo "</tr>";
}
?>