<?php
    require("connection_to_login&signupdb.php");

    $Login_Username = $_POST['Login_Username'];
    $Login_Password = $_POST['Login_Password'];

    $sql = "SELECT * FROM signup WHERE Username = '$Login_Username' AND Password = '$Login_Password' ";

    // Execute the SQL query
$result = $conn->query($sql);

// Check if the query was successful
if ($result !== false) {
    // Now you can safely access properties like num_rows
    if ($result->num_rows > 0) {
        // Process the result
    } else {
        // No rows found
    }
} else {
    // Query failed, handle the error
    echo "Error: " . $conn->error;
}


    if($result-> num_rows > 0){
        echo "<script>";
        echo "alert('You have successfulled Loggedin. Sending you to Dashboard.');";
        echo "</script>";
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>";
        echo "alert('Username or Password Invalid');";
        echo "</script>";
    }

    $conn->close();

    ?>