<?php
    $servername = "sql211.infinityfree.com";
    $username = "";
    $password = "";
    $db = "if0_36074239_student_easy";

    $conn = new mysqli($servername, $username, $password, $db);

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    if (!$conn->select_db($db)) {
        die("Database selection failed: " . $conn->error);
    }

    ?>