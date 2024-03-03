<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/dashboard.css">
    <title>Data</title>
    <link rel="stylesheet" href="../CSS/nav_design.css">
</head>
<body>
  <nav class="navbar">
    <a href="../HTML/index.html" class="nav-link">Home</a>
    <a href="../HTML/pricing.html" class="nav-link">Pricing</a>
    <a href="../HTML/aboutus.html" class="nav-link">About Us</a>
    <a href="../HTML/contactus.html" class="nav-link">Contact Us</a>
    <a href="../HTML/login-signup.html" id="sign-in" style="display: block;" class="nav-link">Sign In</a>
    <a href="../HTML/login-signup.html" id="sign-up" style="display: block;" class="nav-link">Sign Up</a>
    <a href="../HTML/Database.html" id="dashboard" style="display: none;" class="nav-link hidden">Database</a>
    <a href="../HTML/index.html" onclick="toggleVisibility(0)" id="sign-out" class="nav-link hidden">Sign Out</a>
  </nav>
  <script src="../JavaScript/track.js"></script>
  <script>
    toggleVisibility(1);
    
  </script>
    <h1>Below are the data</h1>
    <br><br>
    <?php
        require("connection_to_login&signupdb.php");

        $sql = "SELECT * FROM students";

        $result = $conn->query($sql);

        if (!$result) {
            die("Error: " . $conn->error);
        }

        if ($result->num_rows > 0) {
        echo "<table>";
echo "<tr><th>ID</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Section</th>
    <th>Phone Number</th><th>Email</th><th>Date Of Birth</th>
    <th>Father Name</th><th>Mother Name</th><th>Address</th><th>Update</th><th>Delete</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["ID"] . "</td>";
    echo "<td>" . $row["First Name"] . "</td>";
    echo "<td>" . $row["Middle Name"] . "</td>";
    echo "<td>" . $row["Last Name"] . "</td>";
    echo "<td>" . $row["Section"] . "</td>";
    echo "<td>" . $row["Phone Number"] . "</td>";
    echo "<td>" . $row["Email"] . "</td>";
    echo "<td>" . $row["Date Of Birth"] . "</td>";
    echo "<td>" . $row["Father Name"] . "</td>";
    echo "<td>" . $row["Mother Name"] . "</td>";
    echo "<td>" . $row["Address"] . "</td>";
    echo "<td>";
    echo "<div class='action-buttons'>";
    echo "<a class='update-link' href='update.php?id=" . $row['ID'] . "'>Update</a>";
    echo "</td>";
    echo "<td>";
    echo "<a class='delete-link' href='delete.php?id=" . $row['ID'] . "'>Delete</a>";
    echo "</div>";

    echo "</td>";
    
    echo "</tr>";
}
echo "</table>";
        }
    ?>

<button><a class="add-student-button" href="../HTML/addstudent.html">Add Student</a></button>


</body>
</html>
