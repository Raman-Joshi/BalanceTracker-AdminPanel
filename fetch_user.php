<?php
include 'db_connect.php'; // Ensure this file contains correct database connection code

header('Content-Type: application/json'); // Set the response format to JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize mobile number from POST request
    $mobile = $_POST['mobile'] ?? '';

    if (!empty($mobile)) {
        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT name, deposited, balance FROM users WHERE mobile = ?");
        if ($stmt) {
            $stmt->bind_param("s", $mobile); // Bind parameters
            $stmt->execute(); // Execute the statement

            // Bind results
            $stmt->bind_result($name, $deposited, $balance);

            if ($stmt->fetch()) {
                // User found, prepare success response
                $response = [
                    'status' => 'success',
                    'name' => $name,
                    'deposited' => $deposited,
                    'balance' => $balance
                ];
            } else {
                // User not found, prepare error response
                $response = ['status' => 'error', 'message' => 'User not found'];
            }

            $stmt->close(); // Close the statement
        } else {
            // Error preparing the statement
            $response = ['status' => 'error', 'message' => 'Database error'];
        }
    } else {
        // Invalid mobile number provided
        $response = ['status' => 'error', 'message' => 'Invalid mobile number'];
    }

    $conn->close(); // Close the database connection

    // Output the response as JSON
    echo json_encode($response);
}
?>
