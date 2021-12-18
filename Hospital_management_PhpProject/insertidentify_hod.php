<?php
$connect = mysqli_connect("localhost","root","root","HospitalP");

$Doc_ID1 = $_POST['Doc_ID1'];
   $Dept_ID1 = $_POST['Dept_ID1'];
   $query= " SELECT `identify_hod`('$Doc_ID1', '$Dept_ID1') AS `identify_hod`;";
   
 $result = mysqli_query($connect, $query);
        $row= mysqli_fetch_row($result);
           foreach ($row as $key => $value) {
               echo'Identify HOD (If the doctor is a HOD of the respective department then 1 else 0 )  <br>';
            echo $value . "<br>";
    }    
           /*
if($result = mysqli_query($connect, $query)) {
    while($row= mysqli_fetch_row($result)){
        echo'Identify HOD (If the doctor is a HOD of the respective department then 1 else 0 )  <br>';
        print_r($row);
    }
}
 */          
?>





<?php
/*
 Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) 
$mysqli = new mysqli("localhost", "root", "root", "HospitalP");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
   $Doc_ID1 = $_POST['Doc_ID1'];
   $Dept_ID1 = $_POST['Dept_ID1'];
   
  $sql = "Select identify_hod('$Doc_ID1','$Dept_ID1')";

if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
      
        while($row = $result->fetch_array()){
             echo "<table>";
            echo "<tr>";
            
                echo "<th>age(1)</th>";
                
            echo "</tr>";
            echo "<tr>";
                echo "<td>" . $row['count(Pat_ID)'] . "</td>";
                
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
*/
?> 
<br><br>
<a class="btn btn-link ml-2" href="identify_hod.php">Go back and explore more HODs</a>