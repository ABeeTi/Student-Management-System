<?php
require("connection_to_login&signupdb.php");

$ID = (int)$_POST['ID'];
$FName = $_POST['FName'];
$MName = $_POST['MName'];
$LName = $_POST['LName'];
$Section = $_POST['Section'];
$Phone = (int)$_POST['Phone_Number']; // Renamed variable to match the form field name
$Email = $_POST['Email'];   
$DOB = $_POST['DOB'];
$FatherName = $_POST['Father_Name'];
$MotherName = $_POST['Mother_Name'];
$Address = $_POST['Address'];

$sql = "INSERT INTO students (`ID`, `First Name`, `Middle Name`, `Last Name`, `Section`, `Phone Number`, `Email`, `Date Of Birth`, `Father Name`, `Mother Name`, `Address`)
    VALUES ('$ID', '$FName', '$MName', '$LName', '$Section', '$Phone', '$Email', '$DOB', '$FatherName', '$MotherName', '$Address')";

if ($conn->query($sql) === TRUE) {
    echo "<script>";
    echo "alert('Student Added Successfully');";
    echo "window.location.href = '../PHP/dashboard.php';";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('Failed to add Student <?php die( $conn->error);?>;";
    echo "</script>";
}

$conn->close();
?>
