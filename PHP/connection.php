<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);

    if(!$conn){
        die("Connection Failed:" . mysqli_connect_error());
    }

    ?>