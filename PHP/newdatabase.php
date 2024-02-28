<?php
    require("connection.php");

    $new_db_name = $_GET['new_db_name'];

    $create = "CREATE DATABASE `$new_db_name`";

    if($conn -> query($create) === TRUE){
        echo("Database Successfully Created." . "</br>" . "Redirecting to Old page in 3 Second");
        sleep(3);
        header("Location: ../HTML/Database.html");
        exit;
    } else {
        echo "Error creating Database: " . $conn->error;
    }

    $conn->close();

    ?>
