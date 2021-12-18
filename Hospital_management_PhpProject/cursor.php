<html>
<body>
<h1>Stored Procedure - returning a series of results</h1>
<pre><?php

$dbh = new mysqli("localhost","root","root","HospitalP");
$qr = $dbh->query("call display_patient_appointment_info()");
print_r ($qr);

while ($row = $qr->fetch_object()) {
        print_r($row);
        print_r($row);
        }
?></pre><br>
this example returns a series of rows in a resuklt set from
a quey embedded into a stored procedure in MySQL
</body>
</html>