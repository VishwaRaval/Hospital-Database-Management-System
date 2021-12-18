


   

<?php
include_once 'database.php';
if (isset($_POST['save'])) {

    $Staff_ID = $_POST['Staff_ID'];
    $Staff_fname = $_POST['Staff_fname'];
    $Staff_mname = $_POST['Staff_mname'];
    $Staff_lname = $_POST['Staff_lname'];
    $Staff_gender = $_POST['Staff_gender'];
    $Staff_contactno = $_POST['Staff_contactno'];
    $Staff_type = $_POST['Staff_type'];
    $Staff_roomassigned1 = $_POST['Staff_roomassigned1'];
    $Staff_roomassigned2 = $_POST['Staff_roomassigned2'];
    $Staff_dutystarttime = $_POST['Staff_dutystarttime'];
    $Staff_dutyendtime = $_POST['Staff_dutyendtime'];
    $Staff_holiday = $_POST['Staff_holiday'];
    $Staff_DeptID = $_POST['Staff_DeptID'];
    $Staff_Charge = $_POST['Staff_Charge'];




    $sql = "INSERT INTO `Staff` (`Staff_ID`, `Staff_fname`, `Staff_mname`, `Staff_lname`, `Staff_gender`, `Staff_contactno`, `Staff_type`, `Staff_roomassigned1`, `Staff_roomassigned2`, `Staff_dutystarttime`, `Staff_dutyendtime`, `Staff_holiday`, `Staff_DeptID`, `Staff_Charge`) VALUES ('$Staff_ID','$Staff_fname','$Staff_mname','$Staff_lname','$Staff_gender','$Staff_contactno','$Staff_type','$Staff_roomassigned1','$Staff_roomassigned2','$Staff_dutystarttime','$Staff_dutyendtime','$Staff_holiday','$Staff_DeptID','$Staff_Charge')";


    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "<br>Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<html>
</head>
<body>

    <p>

        <a class="btn btn-link ml-2" href="Staff_InsertForm.php">Go back for inserting More patients</a>
    </p>
</body>
</html>
<?php

