<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "Aagneya@123";

// Check if form is submitted and dbName is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dbName'])) {
    try {
        // Create a connection to the MySQL server using PDO
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get the name of the database from the form input
        $dbName = $_POST['dbName'];

        // Create the database
        $sql = "CREATE DATABASE $dbName";
        $conn->exec($sql);
        echo "Database created successfully";
    } catch(PDOException $e) {
        echo "Error creating database: " . $e->getMessage();
    }

    // Close the connection
    $conn = null;
} else {
    // If dbName is not set or form is not submitted, redirect to the form page
    header("Location: ../HTML/Create_Database.html");
    exit;
}
?>
