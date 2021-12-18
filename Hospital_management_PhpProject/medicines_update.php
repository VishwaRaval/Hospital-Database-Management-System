<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM Medicines");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Update medicine data</title>
   <link rel="stylesheet" href="style.css">
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
                <td><a href="medicines_update_process.php?id=<?php echo $row["id"]; ?>">Update</a></td>
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>

<html>
    <body>
        <br><
 <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
 <br>
 </body>
</html>

<br>
<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM medicines_updates");
?>
<!DOCTYPE html>
<html>
 <head>
  
 <title> Show medicines available Data </title>
 <h>Medicine_updates Table (Trigger 2)</h>
 <link rel="stylesheet" href="styles.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
     <td>change_date</td>
     <td>field_name</td>
     <td>before_value</td>
     <td>after_value</td>
    

    
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    
  
    
    <td><?php echo $row["change_date"]; ?></td>
     <td><?php echo $row["field_name"]; ?></td>
     <td><?php echo $row["before_value"]; ?></td>
     <td><?php echo $row["after_value"]; ?></td>
    
    
    
    
    
    
    
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

