<!DOCTYPE html>
<html>
    <body>
        <form method="post" action="Room_process.php">
            <link rel="stylesheet" href="styles.css">          

            ROOM ID :<br>
            <input type="text" name="Room_ID">
            <br>
            Room TYPE:<br>
            <input type="text" name="Room_Type">
            <br>
            Room Charge:<br>
            <input type="text" name="Room_Charge">
            <br>
            <br><br>
            <input type="submit" name="save" value="submit">
            <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
        </form>
    </body>
</html>