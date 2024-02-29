<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
</head>
<body>
    <h1>Below are the data</h1>
    <br><br>
    <?php
        require("connection_to_login&signupdb.php");

        $sql = "SELECT * FROM students";

        $result = $conn->query($sql);

        if (!$result) {
            die("Error: " . $conn->error); // Output the error message and terminate script execution
        }

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Section</th>
                <th>Phone Number</th><th>Email</th><th>Date Of Birth</th>
                <th>Father Name</th><th>Mother Name</th><th>Address</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["First_Name"] . "</td>"; // Corrected column name
                echo "<td>" . $row["Middle_Name"] . "</td>"; // Corrected column name
                echo "<td>" . $row["Last_Name"] . "</td>"; // Corrected column name
                echo "<td>" . $row["Section"] . "</td>";
                echo "<td>" . $row["Phone_Number"] . "</td>"; // Corrected column name
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["Date_Of_Birth"] . "</td>"; // Corrected column name
                echo "<td>" . $row["Father_Name"] . "</td>"; // Corrected column name
                echo "<td>" . $row["Mother_Name"] . "</td>"; // Corrected column name
                echo "<td>" . $row["Address"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    ?>

    <a href="../HTML/addstudent.html">Add Student</a>

</body>
</html>
