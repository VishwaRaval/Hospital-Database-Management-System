<?php
include_once 'database.php';
if (isset($_POST['save'])) {

  
                $Med_ID  = $_POST['Med_ID']; 
                $Med_Name  = $_POST['Med_Name'];
                $Med_company  = $_POST['Med_company'];
                $Med_price  = $_POST['Med_price'];
                $Med_dose = $_POST['Med_dose']; 
                $Med_type = $_POST['Med_type'];


    $sql = "INSERT INTO `MEDICINES`(`Med_ID`, `Med_Name`, `Med_company`, `Med_price`, `Med_dose`, `Med_type`) VALUES ('$Med_ID','$Med_Name','$Med_company','$Med_price','$Med_dose','$Med_type')";


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
</head>
<body>

    <p>
<br>
<br>        <a class="btn btn-link ml-2" href="show_addmedicines.php">Go back for inserting more medicines</a>
    </p>
</body>
</html>
