<html>
    <body>
        <form method="post" action="insertidentify_hod.php">
<?php
include_once 'database.php';
$result = mysqli_query($conn,"select distinct patient_personal_info.Pat_ID, patient_personal_info.Pat_contactno, patient_personal_info.Pat_fname,patient_personal_info.Pat_gender,appointment.app_date_time from appointment natural join patient_personal_info where month(appointment.app_date_time)=month(current_date()) and year(appointment.app_date_time)=year(current_date())");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> patients With appointment this month</title>
 <link rel="stylesheet" href="styles.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
     
     <td>Pat_ID</td>
    <td>Pat_contactno</td>
    <td>Pat_fname</td>
    <td>Pat_gender</td>
    <td>app_date_time</td>
    
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["Pat_ID"]; ?></td>
    <td><?php echo $row["Pat_contactno"]; ?></td>
    <td><?php echo $row["Pat_fname"]; ?></td>
    <td><?php echo $row["Pat_fname"]; ?></td>
    <td><?php echo $row["app_date_time"]; ?></td>
    
    
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