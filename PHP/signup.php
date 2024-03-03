<?php
    require("connection_to_login&signupdb.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (isset($_POST['FName']) && !empty($_POST['FName']) &&
                isset($_POST['LName']) && !empty($_POST['LName']) &&
                isset($_POST['DOB']) && !empty($_POST['DOB']) &&
                isset($_POST['Email']) && !empty($_POST['Email']) &&
                isset($_POST['Username']) && !empty($_POST['Username']) &&
                isset($_POST['Password']) && !empty($_POST['Password'])) {

                // All required fields are filled, proceed with further validation or data processing
                $Fname = $_POST['FName'];
                $Lname = $_POST['LName'];
                $DOB = $_POST['DOB'];
                $Email = $_POST['Email'];
                $Username = $_POST['Username'];
                $Password = $_POST['Password'];

                function generateRecoveryCode() {
                    $key = uniqid(); // Generate a unique identifier
                    $key = substr_replace($key, "-", 4, 0); // Insert hyphen at position 4
                    $key = substr_replace($key, "-", 9, 0); // Insert hyphen at position 9
                    $key = substr_replace($key, "-", 14, 0); // Insert hyphen at position 14
                    return $key;
                }
            
                $recoveryCode = generateRecoveryCode();
            
                    $sql = "INSERT INTO signup (`Recovery Code`, `First Name`, `Last Name`, `Date Of Birth`, `Email`, `Username`, `Password`)
                            VALUES ('$recoveryCode', '$Fname', '$Lname', '$DOB', '$Email', '$Username', '$Password')";
            
            
                if ($conn->query($sql) === TRUE) {
                echo "<script>";
                echo "var code = '" . $recoveryCode . "';";
                echo "alert('Sign Up successful.\\nYour Recovery Code: ' + code + '\\nPlease note it, It will be used during resetting your password.\\nNow, Please Login.');";
                echo "window.location.href = '../HTML/login-signup.html';";
                echo "</script>";
            } else {
                echo "Error: " . "<br>" . $conn->error;
            }
                $conn->close();
            } else {
                echo "<script>";
                echo "alert('Any empty field result in whole form being reset. \\nPlease check before submiting.');";
                echo "window.location.href = '../HTML/login-signup.html';";
                echo "</script>";
                exit();
            }
        } else {
            // If the form is not submitted, redirect back to the form page
            header("Location: ../HTML/login-signup.html");
            exit();
}
    ?>