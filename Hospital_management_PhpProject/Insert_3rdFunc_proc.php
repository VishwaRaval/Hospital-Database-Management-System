<html>
    <body>
        <form method="post" action="Insert_3rdFunc_proc.php">
<?php
$connect = mysqli_connect("localhost","root","root","HospitalP");

$patage = $_POST['patage'];

   $query= " SELECT `age`('$patage') AS `age`;";
   
 
 $result = mysqli_query($connect, $query);
        $row= mysqli_fetch_row($result);
           foreach ($row as $key => $value) {
               echo'Age <br>';
            echo $value . "<br>";
    }  
         /*  
if($result = mysqli_query($connect, $query)) {
    while($row= mysqli_fetch_row($result)){
        echo'Age <br>';
        print_r($row);
    }
}
           */
?>

<?php
$connect = mysqli_connect("localhost","root","root","HospitalP");

$patage = $_POST['patage'];
   $query= " CALL `patient_age_msg`('$patage');";
       $result = mysqli_query($connect, $query);
        $row= mysqli_fetch_row($result);
           foreach ($row as $key => $value) {
               
            echo $value . "<br>";
    }  /* 
if($result = mysqli_query($connect, $query)) {
    while($row= mysqli_fetch_row($result)){
        echo '<br>';
        print_r($row);
    }
}*/
           
?>


            <?php 
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) 
$mysqli = new mysqli("localhost", "root", "root", "HospitalP");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
   $patage = $_POST['patage'];
   
// Attempt select query execution
if($patage==1){
    echo 'age';
    echo '<br>20';
}
if($patage==2){
    echo 'age';
    echo '<br>19';
}
if($patage==3){
    echo 'age';
    echo '<br>21';
}
if($patage==4){
    echo 'age';
    echo '<br>1999';
}
if($patage==5){
    echo 'age';
    echo '<br>41';
}
if($patage==6){
    echo 'age';
    echo '<br>24';
}

if($patage= range(18, 200)){
    echo '<br>Patient is a Major';
}
elseif($patage=range(0,18)){
    echo '<br>Minor Patient';
}
    
// Close connection
$mysqli->close();*/
?>
<br><br>
<a class="btn btn-link ml-2" href="3rdFunc_Prcod.php">Go back and explore more Days</a>
</form>
        </body>
</html>