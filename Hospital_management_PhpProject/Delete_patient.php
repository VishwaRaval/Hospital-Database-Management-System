
<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM Patient_personal_info");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Delete Patient data</title>
</head>
<body>
<table>
	<tr>
	 <td>Pat_ID</td>
        <td>Pat_fname</td>
        <td>Pat_mname</td> 
        <td>Pat_lname</td> 
        <td>Pat_gender</td>
        <td>Pat_DOB</td>
        <td>Pat_contactno</td> 
        <td>Pat_emailID</td>
        <td>Pat_Address</td>
        <td>Pat_MedHistory</td>
        <td>Pat_BloodGroup</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	
        <td><?php echo $row["Pat_ID"]; ?></td>
        <td><?php echo $row["Pat_fname"];?></td>
        <td><?php echo $row["Pat_mname"];?></td>
        <td><?php echo $row["Pat_lname"];?></td> 
        <td><?php echo $row["Pat_gender"];?></td>
        <td><?php echo $row["Pat_DOB"]; ?></td>
        <td><?php echo $row["Pat_contactno"];?></td> 
        <td><?php echo $row["Pat_emailID"];?></td>
        <td><?php echo $row["Pat_Address"];?></td>
        <td><?php echo $row["Pat_MedHistory"];?></td>
        <td><?php echo $row["Pat_BloodGroup"];?></td>
	
        
        <td><a href="Patient_delete_process.php?Pat_ID=<?php echo $row["Pat_ID"]; ?>">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
        
</table>
    <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
</body>
</html>