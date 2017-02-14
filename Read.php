<?php
// READ - Fetch rows from database

try {
  $PDO = DB::Open();
  
  // Use prepared statements to help sanitization
  $Statement = $PDO->prepare("SELECT * FROM Data ORDER BY id ASC");
  $Statement->execute();
  
  $Statement->setFetchMode(PDO::FETCH_ASSOC);
  $Result = $Statement->fetchAll(); // fetches, essentially, JSON format
  //print_r($Result[1]["name"]);
  
  for($x=0; $x<count($Result); $x++) {
    echo "<tr>";
    //echo "<td>" . $x . "</td>";
    //for($y=0; $y<count($Result[$x]); $y++) {
    //}
    echo "<td class='id'>" . $Result[$x]["id"] . "</td>";
    echo "<td class='name'>" . $Result[$x]["name"] . "</td>";
    echo "<td class='phone'>" . formatPhoneNum($Result[$x]["phone"]) . "</td>";
    
    echo "<td class='Change'>";
    //echo "<button type='button' class='btn btn-success'>Add</button>";
    echo "<button type='button' class='btn btn-sm btn-primary btnChange' data-toggle='modal' data-target='#DiagDB'>Change</button>";
    echo "<button type='button' class='btn btn-sm btn-danger btnDelete' data-toggle='modal' data-target='#DiagDB'>Delete</button>";
    echo "</td>";
    echo "</tr>";
  }
  
  DB::Close();
}
catch(PDOException $e) {
  echo "ERROR: " . $e->getMessage();
}

function formatPhoneNum($pNum) {
  // (AREACODE) ABC-DEFG
  return "(" . substr($pNum,0,3) . ") " . substr($pNum,3,3) . "-" . substr($pNum,6);
}

?>