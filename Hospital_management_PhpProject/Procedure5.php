
<html>
    <body>
        <link rel="stylesheet" href="style.css">
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
$sql = "select patient_personal_info.Pat_ID,patient_personal_info.Pat_fname, patient_personal_info.Pat_contactno,appointment.App_ID, appointment.App_Date_Time from appointment natural join patient_personal_info where dayofweek(appointment.app_date_time)=1 or dayofweek(appointment.app_date_time)=7 ";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
      echo "<table>";
        echo "<tr>";
            
                echo "<th>Pat_ID</th>";
                echo "<th>Pat_fname</th>";
                echo "<th>Pat_contactno</th>";
                echo "<th>App_ID</th>";
                echo "<th>App_Date_Time</th>";
                
                echo "</tr>";
        while($row = $result->fetch_array()){
             
            
            echo "<tr>";
                echo "<td>" . $row['Pat_ID'] . "</td>";
                echo "<td>" . $row['Pat_fname'] . "</td>";
                echo "<td>" . $row['Pat_contactno'] . "</td>";
                echo "<td>" . $row['App_ID'] . "</td>";
                echo "<td>" . $row['App_Date_Time'] . "</td>";
                
                
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
<a class="btn btn-link ml-2" href="welcome.php">Go back and explore more </a>

</head>
</body>
</html>