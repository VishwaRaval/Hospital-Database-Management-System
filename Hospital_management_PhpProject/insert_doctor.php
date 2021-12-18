<?php
include_once 'database.php';
if (isset($_POST['save'])) {

    $Doc_ID  = $_POST['Doc_ID'];
    $Doc_fname = $_POST['Doc_fname'];
    $Doc_mname = $_POST['Doc_mname'];
    $Doc_lname = $_POST['Doc_lname'];
    $Doc_gender = $_POST['Doc_gender'];
    $Doc_DOB = $_POST['Doc_DOB'];
    $Doc_contactno = $_POST['Doc_contactno'];
    $Doc_emailID = $_POST['Doc_emailID'];
    $Doc_Address = $_POST['Doc_Address'];
    $Doc_Specialist = $_POST['Doc_Specialist'];
    $Doc_DeptID = $_POST['Doc_DeptID'];
    $Doc_charge = $_POST['Doc_charge'];




    $sql = "INSERT INTO `Doctor_info`(`Doc_ID`, `Doc_fname`, `Doc_mname`, `Doc_lname`, `Doc_gender`, `Doc_DOB`, `Doc_contactno`, `Doc_emailID`, `Doc_Address`, `Doc_Specialist`, `Doc_DeptID`, `Doc_charge`) VALUES ('$Doc_ID','$Doc_fname','$Doc_mname','$Doc_lname','$Doc_gender','$Doc_DOB','$Doc_contactno','$Doc_emailID','$Doc_Address','$Doc_Specialist','$Doc_DeptID','$Doc_charge')";


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

        <a class="btn btn-link ml-2" href="inser_doc_process.php">Go back for inserting More patients</a>
    </p>
</body>
</html>
<?php

