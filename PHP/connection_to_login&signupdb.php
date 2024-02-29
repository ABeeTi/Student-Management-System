<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "student easy";

    $conn = new mysqli($servername, $username, $password, $db);

    if (!$conn){
        die("Connection to the database failed: " . mysqli_connect_error());
    }

    ?>