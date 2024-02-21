<?php
// Retrieve the database name from the AJAX request
$dbName = $_POST['dbName'];

// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve table names
$tableResult = $conn->query("SHOW TABLES");

if ($tableResult->num_rows > 0) {
    echo "<ul>";
    while ($tableRow = $tableResult->fetch_row()) {
        $tableName = $tableRow[0];
        echo "<li>Table: $tableName";
        
        // Retrieve column names and types
        $columnResult = $conn->query("SHOW COLUMNS FROM $tableName");
        
        if ($columnResult->num_rows > 0) {
            echo "<ul>";
            while ($columnRow = $columnResult->fetch_assoc()) {
                $columnName = $columnRow['Field'];
                $columnType = $columnRow['Type'];
                echo "<li>";
                echo "Column: $columnName (Type: $columnType)";
                echo " <button class='edit-btn' data-table='$tableName' data-column='$columnName'>Edit</button>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No columns found for table $tableName</p>";
        }
        
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No tables found in database $dbName</p>";
}

// Close connection
$conn->close();
?>
