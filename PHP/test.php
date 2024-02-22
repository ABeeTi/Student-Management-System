<?php
$servername = "localhost"; // MySQL server hostname
$username = "root"; // MySQL username
$password = ""; // MySQL password

// Attempt to connect to MySQL server
$conn = mysqli_connect($servername, $username, $password);

// Check if connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "MySQL server is running!";
    // Close the connection
    mysqli_close($conn);
}
?>
