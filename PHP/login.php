<?php
require("connection_to_login&signupdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Login_Username']) && !empty($_POST['Login_Username']) &&
        isset($_POST['Login_Password']) && !empty($_POST['Login_Password'])) {
        
        $Login_Username = $_POST['Login_Username'];
        $Login_Password = $_POST['Login_Password'];

        $sql = "SELECT * FROM registration WHERE Username = '$Login_Username' AND Password = '$Login_Password' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<script>";
            echo "alert('You have successfully Logged in. Sending you to Dashboard.');";
            echo "window.location.href = 'dashboard.php';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Username or Password Invalid');";
            echo "window.location.href = '../HTML/login-signup.html';";
            echo "</script>";
        }
        $conn->close();
    } else {
        echo "<script>";
        echo "alert('Fill all the fields.');";
        echo "window.location.href = '../HTML/login-signup.html';";
        echo "</script>";
    }
}
?>
