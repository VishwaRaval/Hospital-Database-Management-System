
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
  
   $Visit_year = $_POST['Visit_year'];
// Attempt select query execution
$sql = "SELECT visit.Visit_ID,appointment.Pat_ID,patient_personal_info.Pat_fname,patient_personal_info.Pat_DOB from visit natural join appointment natural join patient_personal_info where year(appointment.app_date_time)= '$Visit_year' ";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
      
        while($row = $result->fetch_array()){
             echo "<table>";
            echo "<tr>";
            
                echo "<th>Visit_ID</th>";
                echo "<th>Pat_ID</th>";
                echo "<th>Pat_fname</th>";
                echo "<th>Pat_DOB</th>";
                
                echo "</tr>";
            echo "<tr>";
                echo "<td>" . $row['Visit_ID'] . "</td>";
                echo "<td>" . $row['Pat_ID'] . "</td>";
                echo "<td>" . $row['Pat_fname'] . "</td>";
                echo "<td>" . $row['Pat_DOB'] . "</td>";
                
                
                
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
<a class="btn btn-link ml-2" href="Insert_Pr0cedure3b.php">Go back and explore more </a>

</head>
</body>
</html>