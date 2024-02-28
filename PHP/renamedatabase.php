<?php

    $old_db_name = $_GET['old_db_name'];
    $new_db_name = $_GET['new_db_name'];

    $servername = "localhost";
    $username = "root";
    $password = "";


    $conn = new mysqli($servername, $username, $password, $old_db_name);

    if(!$conn){
        die("Connection Failed:" . mysqli_connect_error());
    }

    $rename = "ALTER DATABASE `$old_db_name` RENAME TO `$new_db_name`";

    if ($conn->query($rename) === TRUE){
        echo "Database Successfully Renamed." . "<br>" . "Redirecting in 3 seconds.";
        sleep(3);
        header("Location: ../HTML/Database.html");
    } else {
        echo "Error renaming database: " . $conn->error;
    }

    $conn->close();

    ?>

