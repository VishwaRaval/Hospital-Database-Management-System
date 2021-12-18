



<!DOCTYPE html>
<html>
  <body>
      
      <form method="post" action="medicines_info.php">
		Medicine ID :<br>
                <input type="text" name="Med_ID">
		<br>
                Medicine Name :<br>
                <input type="text" name="Med_Name">
		<br>
                Medicine company :<br>
               <input type="text" name=" Med_company">
		<br> 
                Medicine price :<br>
                <input type="text" name="Med_price">
		<br> 
                Medicine dose :<br>
                <input type="text" name="Med_dose">
		<br> 
                Medicine type :<br>
                <input type="text" name="Med_type">
		<br><br>
                
  <input type="submit" name="save" value="submit">
                <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
     </form>
  </body>
</html>


<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM MEDICINES");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Show medicines available Data </title>
 <link rel="stylesheet" href="styles.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
     
     <td>Med_ID</td>
    <td>Med_Name</td>
    <td>Med_company</td>
    <td>Med_price</td>
    <td>Med_dose</td>
    <td>Med_type</td>
    
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["Med_ID"]; ?></td>
    <td><?php echo $row["Med_Name"]; ?></td>
    <td><?php echo $row["Med_company"]; ?></td>
    <td><?php echo $row["Med_price"]; ?></td>
    <td><?php echo $row["Med_dose"]; ?></td>
    <td><?php echo $row["Med_type"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
 </body>
</html>