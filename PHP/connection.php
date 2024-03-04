<?php
    $servername = "sql211.infinityfree.com";
    $username = "";
    $password = "";

    $conn = new mysqli($servername, $username, $password);

    if(!$conn){
        die("Connection Failed:" . mysqli_connect_error());
    }

    ?>