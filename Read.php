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
    echo "<td>" . $Result[$x]["id"] . "</td>";
    echo "<td>" . $Result[$x]["name"] . "</td>";
    echo "<td>" . formatPhoneNum($Result[$x]["phone"]) . "</td>";
    
    echo "<td class='Change'>";
    //echo "<button type='button' class='btn btn-success'>Add</button>";
    echo "<button type='button' class='btn btn-sm btn-primary'>Change</button>";
    echo "<button type='button' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#Dialog_Delete' data-id='" . $Result[$x]["id"] . "'>Delete</button>";
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