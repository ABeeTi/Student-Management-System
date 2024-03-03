<?php
    $servername = "sql211.infinityfree.com";
    $username = "if0_36074239";
    $password = "Database768004";

    $conn = new mysqli($servername, $username, $password);

    if(!$conn){
        die("Connection Failed:" . mysqli_connect_error());
    }

    ?>