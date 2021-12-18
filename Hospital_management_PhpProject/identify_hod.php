<html>
  <body>
      <link rel="stylesheet" href="style.css">
      <form method="post" action="insertidentify_hod.php">
		
Enter DOC ID<br>
		<input type="text" name="Doc_ID1">
		<br>
                Enter Department  ID<br>
		<input type="text" name="Dept_ID1">
		<br>
  <input type="submit" name="save" value="submit">
                <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
     </form>
  </body>
</html>



<h3>HOD Table</h3>
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
$sql = "SELECT * from HODs";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                
             
                echo "<th>Doc_ID</th>";
                echo "<th>Dept_ID</th>";
                
                
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
              
                echo "<td>" . $row['Doc_ID'] . "</td>";
                  echo "<td>" . $row['Dept_ID'] . "</td>";
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