<?php
    require("connection_to_login&signupdb.php");

    $Login_Username = $_POST['Login_Username'];
    $Login_Password = $_POST['Login_Password'];

    $sql = "SELECT * FROM signup WHERE Username = '$Login_Username' AND Password = '$Login_Password' ";

    $result = $conn->query($sql);

    if($result-> num_rows > 0){
        echo "<script>";
        echo "alert('You have successfulled Loggedin. Sending you to Dashboard.');";
        echo "windows.location.href = '../HTML/dashboard.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Username or Password Invalid');";
        echo "</script>";
    }

    $conn->close();

    ?>