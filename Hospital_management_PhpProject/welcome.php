<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Hospital management site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-outline-primary btn-rounded">reset password</a>
        <a href="logout.php" class="btn btn-outline-primary btn-rounded ml-5">Sign Out of Your Account</a>
        <a href="Patient_personal_info.php" class="btn btn-outline-primary btn-rounded ml-5">create new patient</a><br><br>
        <a href="show_addmedicines.php" class="btn btn-outline-primary btn-rounded ml">Show/ADD  medicines</a>
        <a href="medicines_update.php" class="btn btn-outline-primary btn-rounded ml-5">Update medicines</a>
        <a href="Room_insert.php" class="btn btn-outline-primary btn-rounded ml-5">Add Rooms</a><br><br>
        <a href="Delete_patient.php" class="btn btn-outline-primary btn-rounded ml-5">delete patient record</a>
        <a href="Staff_InsertForm.php" class="btn btn-outline-primary btn-rounded ml-5">Add/Show Staff</a>
        <a href="procedure1_appointments.php" class="btn btn-outline-primary btn-rounded ml-5">Appointment details</a><br><br>
        <a href="bloodgroup.php" class="btn btn-outline-primary btn-rounded ml-5">Check Patient's BY Blood Group</a> 
        <a href="inser_doc_process.php" class="btn btn-outline-primary btn-rounded ml-5">Add Doctor Info</a>
        <a href="Outdoor_patients.php" class="btn btn-outline-primary btn-rounded ml-5">Show Outdoor Patients</a><br><br>
        <a href="identify_hod.php" class="btn btn-outline-primary btn-rounded ml-5">Identify HOD</a>
        <a href="PrintBill.php" class="btn btn-outline-primary btn-rounded ml-5">Final Bill</a>
        <a href="Insert_Procedure_yearwiseAPP.php" class="btn btn-outline-primary btn-rounded ml-5">Show Order of Appointment year Wise</a><br><br>
        <a href="Insert_Pr0cedure3b.php" class="btn btn-outline-primary btn-rounded ml-5">Show Order of Visit Year Wise</a>
        <a href="Procedure5.php" class="btn btn-outline-primary btn-rounded ml-5">display patients on weekend</a>
        <a href="Procedure_Func.php" class="btn btn-outline-primary btn-rounded ml-5">Show No of patients on a particular day</a><br><br>
        <a href="3rdFunc_Prcod.php" class="btn btn-outline-primary btn-rounded ml-5">display patients Age and Age category</a>
        <a href="Show_pat_Month.php" class="btn btn-outline-primary btn-rounded ml-5">Show patient this Month</a>
        <a href="ShowMaxdoc_App.php" class="btn btn-outline-primary btn-rounded ml-5">Show Doctor with Maximum Appointments</a><br><br>
        <a href="ShowMaxPat_App.php" class="btn btn-outline-primary btn-rounded ml-5">Show Patient with Maximum Appointments</a>
        <a href="Top3Doc_Apps.php" class="btn btn-outline-primary btn-rounded ml-5">Top 3 doctors with maximum Appointments</a>
    </p>

</body>
</html>
