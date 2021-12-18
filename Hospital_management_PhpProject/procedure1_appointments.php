
<!DOCTYPE html>
<html>
  <body>
      <link rel="stylesheet" href="style.css">
      <form method="post" action="Staff_Insert.php">
		
          
          
              
     </form>
  </body>
</html>



<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "root", "HospitalP");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
     
// Attempt select query execution

$sql = "select distinct Patient_personal_info.Pat_ID ,Appointment.App_ID, Doctor_info.Doc_ID, Doctor_info.Doc_DeptID, Appointment.App_Date_Time from Patient_personal_info natural join Appointment natural join Doctor_info ";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
      echo "<table>";
       echo "<tr>";
            
         
                echo "<th>Pat_ID</th>";
                echo "<th>App_ID</th>";
                echo "<th>Doc_ID</th>";
                echo "<th>Doc_DeptID</th>";
                echo "<th>App_Date_Time</th>";
        while($row = $result->fetch_array()){
             
           
            echo "<tr>";
                echo "<td>" . $row['Pat_ID'] . "</td>";
                echo "<td>" . $row['App_ID'] . "</td>";
                echo "<td>" . $row['Doc_ID'] . "</td>";
                echo "<td>" . $row['Doc_DeptID'] . "</td>";
                echo "<td>" . $row['App_Date_Time'] . "</td>";
            echo "</tr>";
            
        }
        echo "</table>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your procedure1 were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?> <br><br>
  <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
  <?php
  $query = "SELECT item_name from items WHERE item_id IN('s001','a012')";
$result = mysql_query($query, $conn) or die (mysql_error());
if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
while ($row = mysql_fetch_assoc($result)) {
    echo $row["item_name"];
}
?>