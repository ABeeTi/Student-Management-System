<?php
// Retrieve database name, table name, and column names from the form submission
$dbName = $_POST['dbName'];
$tableName = $_POST['tableName'];
$numColumns = intval($_POST['numColumns']);
$columnNames = array();

for ($i = 1; $i <= $numColumns; $i++) {
    $columnNames[] = $_POST['column' . $i];
}

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

// Create database
$sqlCreateDb = "CREATE DATABASE IF NOT EXISTS $dbName";
if ($conn->query($sqlCreateDb) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the created database
$conn->select_db($dbName);

// Create table query
$sqlCreateTable = "CREATE TABLE $tableName (";
for ($i = 0; $i < $numColumns; $i++) {
    $columnName = $columnNames[$i];
    $sqlCreateTable .= "$columnName VARCHAR(255)";
    if ($i < $numColumns - 1) {
        $sqlCreateTable .= ",";
    }
}
$sqlCreateTable .= ")";

// Execute table creation query
if ($conn->query($sqlCreateTable) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
?>
