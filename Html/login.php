<?php

// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user = $_POST['username'];
$pass = $_POST['password'];


$sql = "SELECT * FROM users WHERE user_name='$user' AND password='$pass'";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "Login successful";
} else {
    echo "Invalid username or password";
}


$conn->close();
?>