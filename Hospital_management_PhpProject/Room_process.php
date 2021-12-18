<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 
	
         $Room_ID= $_POST['Room_ID'];
         $Room_Type= $_POST['Room_Type'];
         $Room_Charge= $_POST['Room_Charge'];
         
         
	 $sql = "INSERT INTO `Rooms`(`Room_ID`, `Room_Type`, `Room_Charge`) VALUES ('$Room_ID','$Room_Type','$Room_Charge')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>


<html>
    <body>
        <link rel="stylesheet" href="style.css">
        <br><br>
        <a class="btn btn-link ml-2" href="room_insert.php">Go back and add other rooms </a>
 
 </body>
</html>