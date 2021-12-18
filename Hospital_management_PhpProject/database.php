<?php
$servername='localhost';
$username='root';
$password='root';
$dbname = "HospitalP";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
?>