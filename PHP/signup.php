<?php
    require("connection_to_login&signupdb.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $Fname = $_POST['FName'];
        $Lname = $_POST['LName'];
        $DOB = $_POST['DOB'];
        $Email = $_POST['Email'];
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];   
    }
    

    $recoveryCode = generateRecoveryCode();

    //If the column has a space in it `Column Name` that `` should be used instead of others.
    //Or else like maria server version will come.
    /* $sql = "INSERT INTO signup (Recovery Code, First Name, Last Name, Date Of Birth, Email, Username, Password)
            VALUES ('$recoveryCode', '$Fname', '$Lname', $DOB', '$Email', '$Username', '$Password')"; */

            $sql = "INSERT INTO signup (`Recovery Code`, `First Name`, `Last Name`, `Date Of Birth`, `Email`, `Username`, `Password`)
                    VALUES ('$recoveryCode', '$Fname', '$Lname', '$DOB', '$Email', '$Username', '$Password')";


    if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo "alert('Sign Up successful. Please Login.');";
        echo "</script>";
    } else {
        /* echo "<script>";
        echo "alert('Error while signing up.');";
        echo "</script>"; */
        echo "Error: " . "<br>" . $conn->error;
    }

    function generateRecoveryCode() {
        $key = uniqid(); // Generate a unique identifier
        $key = substr_replace($key, "-", 4, 0); // Insert hyphen at position 4
        $key = substr_replace($key, "-", 9, 0); // Insert hyphen at position 9
        $key = substr_replace($key, "-", 14, 0); // Insert hyphen at position 14
        return $key;
    }

    $conn->close();
    ?>