<?php 
include 'connection_to_login&signupdb.php';

$id = $_GET['id'];
$select = "SELECT * FROM students WHERE id='$id'";
$data = mysqli_query($conn, $select);

if ($data === false) {
    die("Error: " . mysqli_error($conn)); // Output the error message and terminate script execution
}

$row = mysqli_fetch_array($data);

?>

<html>
    <body>
    <div>
        <form action="" method="POST">
            <label>ID: </label>
            <input type="text" name="ID" value="<?php echo $row['ID'] ?>"><br>
            <label>First Name: </label>
            <input type="text" name="FName" value="<?php echo $row['First Name'] ?>"><br>
            <label>Middle Name: </label>
            <input type="text" name="MName" value="<?php echo $row['Middle Name'] ?>"><br>
            <label>Last Name: </label>
            <input type="text" name="LName" value="<?php echo $row['Last Name'] ?>"><br>
            <label>Section: </label>
            <input type="text" name="Section" value="<?php echo $row['Section'] ?>"><br>
            <label>Phone Number: </label>
            <input type="number" name="Phone_Number" value="<?php echo $row['Phone Number'] ?>"><br>
            <label>Email: </label>
            <input type="email" name="Email" value="<?php echo $row['Email'] ?>"><br>
            <label>Date of Birth: </label>
            <input type="date" name="DOB" value="<?php echo $row['Date Of Birth'] ?>"><br>
            <label>Father Name: </label>
            <input type="text" name="Father_Name" value="<?php echo $row['Father Name'] ?>"><br>
            <label>Mother Name: </label>
            <input type="text" name="Mother_Name" value="<?php echo $row['Mother Name'] ?>"><br>
            <label>Address: </label>
            <input type="text" name="Address" value="<?php echo $row['Address'] ?>"><br>

            <input type="submit" name="update_btn" value="Update">
            <button><a href="dashboard.php">Back</a></button>
        </form>
    </div>
    </body>
</html>

<?php
    if(isset($_POST["update_btn"])){
        $ID = (int)$_POST['ID'];
        $FName = $_POST['FName'];
        $MName = $_POST['MName'];
        $LName = $_POST['LName'];
        $Section = $_POST['Section'];
        $Phone = (int)$_POST['Phone_Number'];
        $Email = $_POST['Email'];   
        $DOB = $_POST['DOB'];
        $FatherName = $_POST['Father_Name'];
        $MotherName = $_POST['Mother_Name'];
        $Address = $_POST['Address'];

        $update = "UPDATE students 
                   SET `First Name` = '$FName', 
                       `Middle Name` = '$MName', 
                       `Last Name` = '$LName', 
                       `Section` = '$Section', 
                       `Phone Number` = '$Phone', 
                       `Email` = '$Email', 
                       `Date Of Birth` = '$DOB', 
                       `Father Name` = '$FatherName', 
                       `Mother Name` = '$MotherName', 
                       `Address` = '$Address' 
                   WHERE `ID` = '$ID'";

        $data = mysqli_query($conn, $update);

        if($data) {
            echo "<script> alert('Update successful');  </script>";
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script> alert('Update failed'); </script>";
        }
}
?>
