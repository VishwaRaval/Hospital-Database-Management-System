
<!DOCTYPE html>
<html>
    <body> <h2>Generate individual Patient's Bill for a particular Doctor </h2>
        <h5>(*referring the Below Data)</h5>
      <link rel="stylesheet" href="style.css">
      <form method="post" action="Bill_Details.php">
		
                Pat_ID<br>
                <input type="number" name="Pat_ID1">
		<br>
                Doc_ID<br>
                <input type="text" name="Doc_ID1">
		<br>
                visit_charge<br>
                <input type="number" name="visit_charge1">
		<br>
                
                 Doc_charge<br>
		<input type="number" name="Doc_charge1">
		<br>
                 Med_price<br>
		<input type="number" name="Med_price1">
		<br>
               
                 no_of_days<br>
                 <input type="number" name="no_of_days1">
		<br>
                 
<br>
                </select>

                <br><br>
  <input type="submit" name="save" value="submit">
                <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
     </form>
  </body>
</html>


<br>

<h3> Generate Bill  with the help below Data</h3>
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
$sql = "SELECT distinct Pat_ID,Doc_ID, Doc_charge,  Visit_ID FROM Appointment Natural Join Doctor_info Natural Join Visit";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                
                echo "<th>Pat_ID</th>";
                echo "<th>Doc_ID</th>";
                echo "<th>Doc_charge</th>";
              echo "<th>Visit_ID</th>";
                
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['Pat_ID'] . "</td>";
                echo "<td>" . $row['Doc_ID'] . "</td>";
                echo "<td>" . $row['Doc_charge'] . "</td>";
                echo "<td>" . $row['Visit_ID'] . "</td>";
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

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "root", "HospitalP");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt select query execution
$sql = "SELECT distinct Visit_ID,Current_Med, Visit_charge  FROM Treatment Natural Join Visit ";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                
                echo "<th>Visit_ID</th>";
                echo "<th>Current_Med</th>";
                echo "<th>Visit_charge</th>";
              
                
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['Visit_ID'] . "</td>";
                echo "<td>" . $row['Current_Med'] . "</td>";
                echo "<td>" . $row['Visit_charge'] . "</td>";
                
                
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



<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "root", "HospitalP");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt select query execution
$sql = "SELECT Med_ID,Med_price from MEDICINES";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                
                echo "<th>Med_ID</th>";
                echo "<th>Med_price</th>";
               
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['Med_ID'] . "</td>";
                echo "<td>" . $row['Med_price'] . "</td>";
                
                
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


