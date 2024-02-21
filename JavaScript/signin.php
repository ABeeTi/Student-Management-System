<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from the AJAX request
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare SQL statement to check if the username and password match a record in the database
$sql = "SELECT * FROM login_info WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// Check if there is a matching record in the database
if ($result->num_rows > 0) {
    // If a matching record is found, send "Yes" as the response
    echo "Yes";
} else {
    // If no matching record is found, send "No" as the response
    echo "No";
}

// Close the database connection
$conn->close();
?>
