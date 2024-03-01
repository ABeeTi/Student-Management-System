<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "student easy";

    $conn = new mysqli($servername, $username, $password, $db);

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    if (!$conn->select_db($db)) {
        die("Database selection failed: " . $conn->error);
    }

    ?>