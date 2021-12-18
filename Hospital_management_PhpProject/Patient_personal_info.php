
<!DOCTYPE html>
<html>
  <body>
      <link rel="stylesheet" href="style.css">
      <form method="post" action="insertPatientInfo.php">
		
                Patient ID:<br>
                <input type="number" name="Pat_ID">
		<br>
                First Name:<br>
		<input type="text" name="Pat_fname">
		<br>
                Middle Name<br>
		<input type="text" name="Pat_mname">
		<br>
                 Last Name:<br>
		<input type="text" name="Pat_lname">
		<br>
                 Gender (M or F) :<br>
		<input type="text" name="Pat_gender">
		<br>
                Date Of Birth  :<br>
                <input type="date" name="Pat_DOB" >
		<br>
                 Contact Number :<br>
                 <input type="number" name="Pat_contactno" pattern="^\d{10}$">
		<br>
                 Email Address:<br>
                 <input type="email" name="Pat_emailID">
		<br>
                 Address (city) :<br>
		<input type="text" name="Pat_Address">
		<br>
                 Medical history:<br>
		<input type="text" name="Pat_MedHistory">
		<br>
               
                <label for="Pat_BloodGroup">Choose BloodGroup:</label>
                <br><select name="Pat_BloodGroup" id="cars">
                    <option >O+ve</option>
                    <option >O-ve</option>
                    <option >A+ve</option>
                    <option >B+ve</option>
                    <option >B-ve</option>
                    <option >AB+ve</option>
                    <option >AB-ve</option>
<br>
                </select>

                <br><br>
  <input type="submit" name="save" value="submit">
                <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
     </form>
  </body>
</html>

<br>

<h3>Patient Table</h3>
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
$sql = "SELECT * FROM Patient_personal_info";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                
                echo "<th>Pat_ID</th>";
                echo "<th>Pat_fname</th>";
                echo "<th>Pat_mname</th>";
                echo "<th>Pat_lname</th>";
                echo "<th>Pat_gender</th>";
                echo "<th>Pat_DOB</th>";
                echo "<th>Pat_contactno</th>";
                echo "<th>Pat_emailID</th>";
                echo "<th>Pat_Address</th>";
                echo "<th>Pat_MedHistory</th>";
                echo "<th>Pat_BloodGroup</th>";
              
                
                
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['Pat_ID'] . "</td>";
                echo "<td>" . $row['Pat_fname'] . "</td>";
                echo "<td>" . $row['Pat_mname'] . "</td>";
                echo "<td>" . $row['Pat_lname'] . "</td>";
                echo "<td>" . $row['Pat_gender'] . "</td>";
                echo "<td>" . $row['Pat_DOB'] . "</td>";
                echo "<td>" . $row['Pat_contactno'] . "</td>";
                echo "<td>" . $row['Pat_emailID'] . "</td>";
                echo "<td>" . $row['Pat_Address'] . "</td>";
                echo "<td>" . $row['Pat_MedHistory'] . "</td>";
                echo "<td>" . $row['Pat_BloodGroup'] . "</td>";
                
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