
<html>
    <body>
 <head>
 
 <link rel="stylesheet" href="styles.css">
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "root", "HospitalP");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
  
   $App_year = $_POST['App_year'];
// Attempt select query execution
$sql = "SELECT * from appointment where year(appointment.app_date_time)= '$App_year' ";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
      
        while($row = $result->fetch_array()){
             echo "<table>";
            echo "<tr>";
            
                echo "<th>App_ID</th>";
                echo "<th>Pat_ID</th>";
                echo "<th>Doc_ID</th>";
                echo "<th>App_Date_Time</th>";
                echo "<th>App_Description</th>";
                echo "</tr>";
            echo "<tr>";
                echo "<td>" . $row['App_ID'] . "</td>";
                echo "<td>" . $row['Pat_ID'] . "</td>";
                echo "<td>" . $row['Doc_ID'] . "</td>";
                echo "<td>" . $row['App_Date_Time'] . "</td>";
                echo "<td>" . $row['App_Description'] . "</td>";
                
                
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
<a class="btn btn-link ml-2" href="Insert_Procedure_yearwiseAPP.php">Go back and explore more App years</a>

</head>
</body>
</html>