<?php
$servername = "localhost"; // Your database server
$username = "jsligsmy_raman";        // Your database username
$password = "Raman@26";            // Your database password
$dbname = "jsligsmy_trial"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
