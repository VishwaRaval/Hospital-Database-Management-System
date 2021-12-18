
<!DOCTYPE html>
<html>
  <body>
      <link rel="stylesheet" href="style.css">
      <form method="post" action="Staff_Insert.php">
		
          
          
    
                Staff ID:<br>
                <input type="text" name="Staff_ID">
		<br>
                First Name:<br>
		<input type="text" name="Staff_fname">
		<br>
                Middle Name<br>
		<input type="text" name="Staff_mname">
		<br>
                 Last Name:<br>
		<input type="text" name="Staff_lname">
		<br>
                 Gender (M or F) :<br>
		<input type="text" name="Staff_gender">
		<br>
                Contact number  :<br>
                <input type="Number" name="Staff_contactno" pattern="^\d{10}$"> 
		<br>
                 Staff Type :<br>
                 <input type="text" name="Staff_type" >
		<br>
                 Staff Assigned Room 1:<br>
                 <input type="text" name="Staff_roomassigned1">
		<br>
                 Staff Assigned Room 2:<br>
		<input type="text" name="Staff_roomassigned2">
		<br>
                 Staff duty start time:<br>
		<input type="time" name="Staff_dutystarttime">
		<br>
                Staff duty end time<br>
		<input type="time" name="Staff_dutyendtime">
		<br>
                Staff holiday:<br>
		<input type="text" name="Staff_holiday">
		<br>
                Staff Department ID:<br>
		<input type="text" name="Staff_DeptID">
		<br>
                 Staff Charge:<br>
		<input type="Number" name="Staff_Charge">
		<br><br>
  <input type="submit" name="save" value="submit">
                <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
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
$sql = "SELECT * FROM Staff";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                 
                echo "<th>Staff_ID</th>";
                echo "<th>Staff_fname</th>";
                echo "<th>Staff_mname</th>";
                echo "<th>Staff_lname</th>";
                echo "<th>Staff_gender</th>";
                echo "<th>Staff_contactno</th>";
                echo "<th>Staff_type</th>";
                echo "<th>Staff_roomassigned1</th>";
                echo "<th>Staff_roomassigned2</th>";
                echo "<th>Staff_dutystarttime</th>";
                echo "<th>Staff_dutyendtime</th>";
                echo "<th>Staff_holiday</th>";
                  echo "<th>Staff_DeptID</th>";
                    echo "<th>Staff_Charge</th>";
                
                
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['Staff_ID'] . "</td>";
                echo "<td>" . $row['Staff_fname'] . "</td>";
                echo "<td>" . $row['Staff_mname'] . "</td>";
                echo "<td>" . $row['Staff_lname'] . "</td>";
                echo "<td>" . $row['Staff_gender'] . "</td>";
                echo "<td>" . $row['Staff_contactno'] . "</td>";
                echo "<td>" . $row['Staff_type'] . "</td>";
                echo "<td>" . $row['Staff_roomassigned1'] . "</td>";
                echo "<td>" . $row['Staff_roomassigned2'] . "</td>";
                echo "<td>" . $row['Staff_dutystarttime'] . "</td>";
                echo "<td>" . $row['Staff_dutyendtime'] . "</td>";
                echo "<td>" . $row['Staff_holiday'] . "</td>";
                echo "<td>" . $row['Staff_DeptID'] . "</td>";
                echo "<td>" . $row['Staff_Charge'] . "</td>";
                
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>