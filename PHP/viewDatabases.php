<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Databases and Tables</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("body").on("click", ".db-name", function(){
        var dbName = $(this).text();
        var contentDiv = $(this).next(".tables");
        if (contentDiv.children().length === 0) {
            $.ajax({
                url: "getTables.php",
                method: "POST",
                data: { dbName: dbName },
                success: function(response) {
                    contentDiv.html(response);
                }
            });
        }
        contentDiv.toggle();
    });

    $("body").on("click", ".edit-btn", function(){
        var columnName = $(this).data("column");
        var columnType = prompt("Enter the new type for column " + columnName);
        
        // Send an AJAX request to update the column type
        // You need to implement the server-side script for handling this update
        $.ajax({
            url: "updateColumnType.php",
            method: "POST",
            data: { columnName: columnName, columnType: columnType },
            success: function(response) {
                // Handle the response, e.g., display a message
                alert(response);
            }
        });
    });
});
</script>
</head>
<body>

<h2>View Databases and Tables</h2>

<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";

// Create database connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve database names excluding system databases
$result = $conn->query("SHOW DATABASES WHERE `Database` NOT IN ('information_schema', 'mysql', 'performance_schema', 'phpmyadmin')");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dbName = $row['Database'];
        echo "<h3 class='db-name'>$dbName</h3>";
        echo "<div class='tables' style='display: none;'></div>";
    }
} else {
    echo "<p>No user databases found</p>";
}

// Close connection
$conn->close();
?>

</body>
</html>
