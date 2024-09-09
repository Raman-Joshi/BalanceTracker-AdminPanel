<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $successMessage = '';
    $errorMessage = '';
    $bgColor = '#f8f9fa'; // Default background color

    if (isset($_POST['address']) && isset($_POST['name']) && isset($_POST['mobile']) && isset($_POST['deposited']) && isset($_POST['balance'])) {
        // Add User
        $address = $_POST['address'];
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $deposited = $_POST['deposited'];
        $balance = $_POST['balance'];

        $stmt = $conn->prepare("INSERT INTO users (address, name, mobile, deposited, balance) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $address, $name, $mobile, $deposited, $balance);
        if ($stmt->execute()) {
            $successMessage = "User Added Successfully.";
            $bgColor = '#00ff3d'; // Green background for success
        } else {
            $errorMessage = "Error adding user.";
            $bgColor = '#e71c2f'; // Red background for error
        }
        $stmt->close();
    } elseif (isset($_POST['update-mobile']) && isset($_POST['update-balance-amount'])) {
        // Update Balance
        $updateMobile = $_POST['update-mobile'];
        $updateBalance = $_POST['update-balance-amount'];

        // Check if the mobile number exists
        $stmt = $conn->prepare("SELECT name FROM users WHERE mobile = ?");
        $stmt->bind_param("s", $updateMobile);
        $stmt->execute();
        $stmt->bind_result($userName);
        if ($stmt->fetch()) {
            // User exists, proceed to update balance
            $stmt->close();

            $stmt = $conn->prepare("UPDATE users SET balance = ? WHERE mobile = ?");
            $stmt->bind_param("ss", $updateBalance, $updateMobile);
            if ($stmt->execute()) {
                $successMessage = "Balance Updated Successfully for User <span style='font-weight: bold; color: #007bff; animation: blink 1s step-start infinite;'>$userName</span>.";
                $bgColor = '#00ff3d'; // Green background for success
            } else {
                $errorMessage = "Error updating balance.";
                $bgColor = '#e71c2f'; // Red background for error
            }
            $stmt->close();
        } else {
            $errorMessage = "User does not exist.";
            $bgColor = '#e71c2f'; // Red background for error
        }
    }

    $conn->close();

    // Display success or error message
    if ($successMessage || $errorMessage) {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>" . ($successMessage ? 'Success' : 'Error') . "</title>
            <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background-color: $bgColor;
                }
                .container {
                    text-align: center;
                }
                @keyframes blink {
                    0% { opacity: 1; }
                    50% { opacity: 0; }
                    100% { opacity: 1; }
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>" . ($successMessage ? $successMessage : $errorMessage) . "</h1>
                <a href='index.html' class='btn btn-primary mt-4'>OK</a>
            </div>
        </body>
        </html>";
    }
}
?>
