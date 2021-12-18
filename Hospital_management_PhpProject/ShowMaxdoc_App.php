<html>
    <body>
        <link rel="stylesheet" href="style.css">
<?php
include_once 'database.php';

$CountMAxdoc =   $_POST['CountMAxdoc'];
$result = mysqli_query($conn,"SELECT
        Appointment.Doc_ID, Doctor_info.Doc_fname, Doctor_info.Doc_contactno, Doctor_info.Doc_DOB, Doctor_info.Doc_gender, COUNT(Doc_ID) = '$CountMAxdoc' AS `value_occurrence`
    FROM
        Appointment
    NATURAL JOIN Doctor_info GROUP BY Doc_ID
    ORDER BY
        `value_occurrence`
    DESC
LIMIT 1 ;");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Doc With max appointments </title>
 <link rel="stylesheet" href="styles.css">
 </head>
 <h1> Doc With maximum appointments </h1>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
     
     <td>Doc_ID</td>
    <td>Doc_fname</td>
    <td>Doc_contactno</td>
    <td>Doc_DOB</td>
    <td>Doc_gender</td>
    
    
    
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["Doc_ID"]; ?></td>
    <td><?php echo $row["Doc_fname"]; ?></td>
    <td><?php echo $row["Doc_DOB"]; ?></td>
    <td><?php echo $row["Doc_DOB"]; ?></td>
    <td><?php echo $row["Doc_gender"]; ?></td>
    
    
    
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