
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "root", "HOSPITAL_management");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt create table query execution

$sql = "CREATE TABLE patient(
Pat_ID INT NOT NULL PRIMARY KEY ,

Pat_fname varchar(20) NOT NULL,

Pat_mname varchar(20),

Pat_lname varchar(20) NOT NULL,

Pat_gender varchar(10) NOT NULL,

Pat_DOB varchar(20),

Pat_contactno INT NOT NULL,

Pat_emailID  varchar(20) NOT NULL UNIQUE,

Pat_Address varchar(100) ,

Pat_MedHistory varchar(250) NOT NULL,

Pat_BloodGroup varchar(10) NOT NULL
)";

if($mysqli->query($sql) === true){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>