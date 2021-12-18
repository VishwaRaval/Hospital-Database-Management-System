
<!DOCTYPE html>
<html>
  <body>
      <link rel="stylesheet" href="style.css">
      <form method="post" action="insert_doctor.php">
		
                Doctor ID:<br>
                <input type="text" name="Doc_ID">
		<br>
                Doctor First Name:<br>
                <input type="text" name="Doc_fname">
		<br>
                Doctor Middle Name<br>
                <input type="text" name="Doc_mname">
		<br>
                Doctor Last name<br>
                <input type="text" name="Doc_lname">
		<br>
                gender:<br>
                <input type="text" name="Doc_gender">
		<br>
                Date OF Birth<br>
                <input type="date" name="Doc_DOB">
		<br>
                Doctor Contact Number:<br>
                <input type="number" name="Doc_contactno">
		<br>
                Doctor Email ID :<br>
                <input type="email" name="Doc_emailID">
		<br>
                Address :<br>
                <input type="text" name="Doc_Address">
		<br>
                Doctor-Specialist :<br>
                <input type="text" name="Doc_Specialist">
		<br>
                Doctor Department ID<br>
                <input type="text" name="Doc_DeptID">
		<br>
                Doctor Charge<br>
                <input type="number" name="Doc_charge">
		<br>
                <br><br>
  <input type="submit" name="save" value="submit">
                <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
     </form>
  </body>
</html>

<br>

<h3>Doctor's Table</h3>
<br>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "root", "HospitalP");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt select query execution
$sql = "SELECT * FROM Doctor_info";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                
            
            
            echo "<th>Doc_ID</th>";
            echo "<th>Doc_fname</th>";
            echo "<th>Doc_mname</th>";
            echo "<th>Doc_lname</th>";
            echo "<th>Doc_gender</th>";
            echo "<th>Doc_DOB</th>";
            echo "<th>Doc_contactno</th>";
            echo "<th>Doc_emailID</th>";
            echo "<th>Doc_Address</th>";
            echo "<th>Doc_Specialist</th>";
            echo "<th>Doc_DeptID</th>";
            echo "<th>Doc_charge</th>";
            
                
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
            
            echo "<td>" . $row['Doc_ID'] . "</td>";
            echo "<td>" . $row['Doc_fname'] . "</td>";
            echo "<td>" . $row['Doc_mname'] . "</td>";
            echo "<td>" . $row['Doc_lname'] . "</td>";
            echo "<td>" . $row['Doc_gender'] . "</td>";
            echo "<td>" . $row['Doc_DOB'] . "</td>";
            echo "<td>" . $row['Doc_contactno'] . "</td>";
            echo "<td>" . $row['Doc_emailID'] . "</td>";
            echo "<td>" . $row['Doc_Address'] . "</td>";
            echo "<td>" . $row['Doc_Specialist'] . "</td>";
            echo "<td>" . $row['Doc_DeptID'] . "</td>";
            echo "<td>" . $row['Doc_charge'] . "</td>";
            
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