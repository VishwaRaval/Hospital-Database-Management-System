<?php
include_once 'database.php';
$sql = "DELETE FROM Patient_personal_info WHERE Pat_ID='" . $_GET["Pat_ID"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    echo "<br>Corresponding Child Records from Appointment, Billing_info and In_Patients  deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
<br>
<br>
<link rel="stylesheet" href="style.css">
<a class="btn btn-link ml-2" href="Delete_patient.php">Go back and Delete more patient Records</a>


<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "root", "HospitalP");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt select query execution
$sql = "SELECT * FROM Appointment";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
              
            
            echo 'Check appointment table for Trigger 4 Confirmation';
            
                echo "<th>App_ID</th>";
                echo "<th>Pat_ID</th>";
                echo "<th>Doc_ID</th>";
                echo "<th>App_Date_Time</th>";
                echo "<th>App_Description</th>";
              
                
                
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['App_ID'] . "</td>";
                echo "<td>" . $row['Pat_ID'] . "</td>";
                echo "<td>" . $row['Doc_ID'] . "</td>";
                echo "<td>" . $row['App_Date_Time'] . "</td>";
                echo "<td>" . $row['App_Description'] . "</td>";
                
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