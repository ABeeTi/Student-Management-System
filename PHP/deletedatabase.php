<?php
    require("connection.php");

    $db = $_GET['delete_db'];

    $delete = "DROP DATABASE `$db`";

    if ($conn -> query($db) === TRUE){
        echo "DatabaseSuccessfully Deleted." . "<br>" . "Redirecting in 3 seconds.";
        sleep(3);
        header("Location: ../HTML/Database.html");
    } else {
        echo "Error deleting database: " . $conn->error;
    }

    $conn->close();

    ?>