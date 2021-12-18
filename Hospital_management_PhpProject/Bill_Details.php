
<?php
include_once 'database.php';
if (isset($_POST['save'])) {

    
    $Pat_ID1 = $_POST['Pat_ID1'];
    $Doc_ID1 = $_POST['Doc_ID1'];
    $visit_charge1 = $_POST['visit_charge1'];
    $Doc_charge1 = $_POST['Doc_charge1'];
    $Med_price1 = $_POST['Med_price1'];
    
    $no_of_days1 = $_POST['no_of_days1'];
    
    echo 'PATIENT ID IS  <br>';
    print($Pat_ID1);
    echo '<br>DOCTOR ID IS <br>';
    print($Doc_ID1);
    echo '<br>VISIT CHARGE IS <br>';
    print($visit_charge1);
    echo '<br>DOCTOR CHARGE IS <br>';
    print($Doc_charge1);
    echo '<br>MEDICINE PRICE IS  <br>';
    print($Med_price1);
    echo '<br>NUMBER OF DAYS THE PATIENT VISITED/STAYED  <br>';
    print($no_of_days1);
    echo '<br>Total Charge For this patient is <br>';
    $total_charge= ($visit_charge1+$Doc_charge1)*$no_of_days1+$Med_price1;
    print($total_charge);
   echo '<br>( Total_charge = (visit_charge+Doc_charge)*no_of_days+Med_price )';
   
     echo '<br>';
      mysqli_close($conn);
}
?>
<html>
<body>
    <link rel="stylesheet" href="style.css">

    <p>
<br>
<br>
<a class="btn btn-link ml-2" href="PrintBill.php">Go back for Generating More Bills</a>
    </p>
</body>
</html>

