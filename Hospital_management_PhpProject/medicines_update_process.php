
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

<?php
include_once 'database.php';
if(count($_POST)>0) {
    
    

mysqli_query($conn,"UPDATE `MEDICINES` SET `Med_ID`='" . $_POST['Med_ID'] . "' ,`Med_Name`='" . $_POST['Med_Name'] . "',`Med_company`='" . $_POST['Med_company'] . "',`Med_price`='" . $_POST['Med_price'] . "',`Med_dose`='" . $_POST['Med_dose'] . "',`Med_type`='" . $_POST['Med_type'] . "' WHERE `Med_ID`='" . $_POST['Med_ID'] . "'");
 if (mysqli_query($conn, $sql)) {
        echo "record Modified successfully !";
        
    } else {
        echo "Updated " . $sql . "
" . mysqli_error($conn);
    }

}
$result = mysqli_query($conn,"SELECT * FROM medicines WHERE Med_ID='" . $_GET['Med_ID'] . "'");

$row= mysqli_fetch_array($result);
?>




<html>
<head>
<title>Update Medicines Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
    <br><br>
    <a href="show_addmedicines.php">Medicine List</a>
</div>
    
    
Medicine ID: <br>
<input type="hidden" name="Med_ID" class="txtField" value="<?php echo $row["Med_ID"]; ?>">
<input type="text" name="Med_ID"  value="<?php echo $row["Med_ID"]; ?>">
<br>
Medicine name: <br>
<input type="text" name="Med_Name" class="txtField" value="<?php echo $row["Med_Name"]; ?>">
<br>
Medicine Company :<br>
<input type="text" name="Med_company" class="txtField" value="<?php echo $row["Med_company"]; ?>">
<br>
Medicine Price:<br>
<input type="text" name="Med_price" class="txtField" value="<?php echo $row["Med_price"]; ?>">
<br>
Medicine Dose:<br>
<input type="text" name="Med_dose" class="txtField" value="<?php echo $row["Med_dose"]; ?>">
<br>
Medicine type:<br>
<input type="text" name="Med_type" class="txtField" value="<?php echo $row["Med_type"]; ?>">
<br>

<input type="submit" name="Update" value="Update" class="button">

</form>
</body>
</html>

</body>
</html>

<html>
    <body>
        <link rel="stylesheet" href="style.css">
        <br><br>
        <a class="btn btn-link ml-2" href="medicines_update.php">Go back and update other medicines </a>
 
 </body>
</html>

<html>
    <body>
        <br><br>
    <head> Trigger 1 </head>
    
 </body>
</html>


<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM medicines_updates");
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

