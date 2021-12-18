<html>
  <body>
      <link rel="stylesheet" href="style.css">
      <form method="post" action="Procedure3b_yearwiseVisit.php">
          <br>
          <br>
          <br>
          <br>
          
           For Year Wise patient visits, enter year :<br>
                <input type="number" name="Visit_year">
		<br>

  <input type="submit" name="save" value="submit">
                <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
     </form>
  </body>
</html>


<h3></h3>
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
$sql = "SELECT app_date_time FROM Appointment";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                
             
                echo "<th>Visit year</th>";
              
                
                
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
              
                echo "<td>" . $row['app_date_time'] . "</td>";
                
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