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
  //print_r($Result[1]["name"]);
}
catch(PDOException $e) {
  echo "ERROR: " . $e->getMessage();
}

for($x=0; $x<count($Result); $x++) {
  echo "<tr>";
  //echo "<td>" . $x . "</td>";
  //for($y=0; $y<count($Result[$x]); $y++) {
  //}
  echo "<td>" . $Result[$x]["id"] . "</td>";
  echo "<td>" . $Result[$x]["name"] . "</td>";
  echo "<td>" . formatPhoneNum($Result[$x]["phone"]) . "</td>";
  
  echo "<td class='Change'>";
  //echo "<button type='button' class='btn btn-success'>Add</button>";
  echo "<button type='button' class='btn btn-sm btn-primary'>Change</button>";
  echo "<button type='button' class='btn btn-sm btn-danger'>Delete</button>";
  echo "</td>";
  echo "</tr>";
}

function formatPhoneNum($pNum) {
  // (AREACODE) ABC-DEFG
  return "(" . substr($pNum,0,3) . ") " . substr($pNum,3,3) . "-" . substr($pNum,6);
}

?>