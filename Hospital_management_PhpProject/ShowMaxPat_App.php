<html>
    <body>
        <link rel="stylesheet" href="style.css">
<?php
include_once 'database.php';

$CountMAxdoc =   $_POST['CountMAxdoc'];
$result = mysqli_query($conn,"SELECT
Patient_personal_info.Pat_ID,Patient_personal_info.Pat_fname,Patient_personal_info.Pat_contactno,Patient_personal_info.Pat_DOB,Patient_personal_info.Pat_gender,
COUNT(App_ID) AS `value_occurrence`
    FROM
        Appointment
    NATURAL JOIN Patient_personal_info 
           GROUP BY Pat_ID
    ORDER BY
        `value_occurrence`

    DESC
LIMIT 1 ;");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Patients With maximum appointments</title>
 <link rel="stylesheet" href="styles.css">
 </head>
 <body><h1>Patients With maximum appointments</h1>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
     
     <td>Pat_ID</td>
    <td>Pat_fname</td>
    <td>Pat_contactno</td>
    <td>Pat_DOB</td>
    <td>Pat_gender</td>
    
    
    
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["Pat_ID"]; ?></td>
    <td><?php echo $row["Pat_fname"]; ?></td>
    <td><?php echo $row["Pat_contactno"]; ?></td>
    <td><?php echo $row["Pat_DOB"]; ?></td>
    <td><?php echo $row["Pat_gender"]; ?></td>
    
    
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
    </form>
 </body>
</html>
<br>
  <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>