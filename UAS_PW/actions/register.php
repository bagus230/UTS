<?php
session_start();
require '../config/db.php';

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Secure the inputs
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);
$confirm_password = $conn->real_escape_string($confirm_password);

// Check if passwords match
if ($password !== $confirm_password) {
    echo "Passwords do not match.";
    exit();
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the user into the database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
if ($conn->query($sql) === TRUE) {
    $_SESSION['user_id'] = $conn->insert_id;
    $_SESSION['username'] = $username;
    header("Location: ../public/dashboard.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
