<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "root", "HospitalP");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
   $Pat_Bloodgroup1 = $_POST['Pat_BloodGroup1'];
   $Pat_ID = $_POST['Pat_ID'];
// Attempt select query execution
$sql = "select count(Pat_ID) from Patient_personal_info where Pat_Bloodgroup='$Pat_Bloodgroup1'";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
      
        while($row = $result->fetch_array()){
             echo "<table>";
            echo "<tr>";
            
                echo "<th>Pat_BloodGroup</th>";
                
            echo "</tr>";
            echo "<tr>";
                echo "<td>" . $row['count(Pat_ID)'] . "</td>";
                
        }
        echo "</table>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your function1 were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
} 
// Close connection
$mysqli->close();
?>
<br><br>
<a class="btn btn-link ml-2" href="bloodgroup.php">Go back and explore more bloodgroups</a>