<html>
    <body>
        
        
 <?php
$connect = mysqli_connect("localhost","root","root","HospitalP");

$dayno = $_POST['dayno'];
   $query= "SELECT total_patients_on_this_day($dayno);";
$result = mysqli_query($connect, $query);
        $row= mysqli_fetch_row($result);
           foreach ($row as $key => $value) {
                echo'total_patients_on_this_day are  <br>';
            echo $value . "<br>";
    }
/*if($result = mysqli_query($connect, $query)) {
    while($row= mysqli_fetch_row($result)){
        echo'total_patients_on_this_day are  <br>';
        print_r($row);
    }
}*/

?>
                
 <?php
$connect = mysqli_connect("localhost","root","root","HospitalP");

$dayno = $_POST['dayno'];
   $query= "CALL `patient_count_msg`($dayno);";

 $result = mysqli_query($connect, $query);
        $row= mysqli_fetch_row($result);
           foreach ($row as $key => $value) {
               
            echo $value . "<br>";
    }
    /*
if($result = mysqli_query($connect, $query)) {
    while($row= mysqli_fetch_row($result)){
        echo'<br>';
        print_r($row);
    }
}
*/
?>


<br><br>
<a class="btn btn-link ml-2" href="Procedure_Func.php">Go back and explore more Days</a>
</body>
</html>