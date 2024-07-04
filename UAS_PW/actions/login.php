<?php
session_start();
require '../config/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Secure the inputs
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

// Fetch the user from the database
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Debugging: Print hashed password from database
    echo "Hashed password from DB: " . $user['password'] . "<br>";

    // Verify the password
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: ../public/dashboard.php");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with that username.";
}

$conn->close();
?>
