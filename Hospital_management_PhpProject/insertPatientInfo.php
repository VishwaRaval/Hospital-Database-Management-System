<?php
include_once 'database.php';
if (isset($_POST['save'])) {

    $Pat_ID = $_POST['Pat_ID'];
    $Pat_fname = $_POST['Pat_fname'];
    $Pat_mname = $_POST['Pat_mname'];
    $Pat_lname = $_POST['Pat_lname'];
    $Pat_gender = $_POST['Pat_gender'];
    $Pat_DOB = $_POST['Pat_DOB'];
    $Pat_contactno = $_POST['Pat_contactno'];
    $Pat_emailID = $_POST['Pat_emailID'];
    $Pat_Address = $_POST['Pat_Address'];
    $Pat_MedHistory = $_POST['Pat_MedHistory'];
    $Pat_BloodGroup = $_POST['Pat_BloodGroup'];





    $sql = "INSERT INTO `Patient_personal_info` (`Pat_ID`, `Pat_fname`, `Pat_mname`, `Pat_lname`, `Pat_gender`, `Pat_DOB`, `Pat_contactno`, `Pat_emailID`, `Pat_Address`, `Pat_MedHistory`, `Pat_BloodGroup`) VALUES ('$Pat_ID','$Pat_fname','$Pat_mname','$Pat_lname','$Pat_gender','$Pat_DOB','$Pat_contactno','$Pat_emailID','$Pat_Address','$Pat_MedHistory','$Pat_BloodGroup')";


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

        <a class="btn btn-link ml-2" href="Patient_personal_info.php">Go back for inserting More patients</a>
    </p>
</body>
</html>
<?php


/* Attempt MySQL server connection. Assuming you are running MySQL
  server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "HospitalP");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM logs";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>action</th>";
        echo "<th>created_date</th>";

        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['action'] . "</td>";
            echo "<td>" . $row['created_date'] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>