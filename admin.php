<?php
session_start();

$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "";  // Replace with your MySQL password
$dbname = "your_database_name";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Validate credentials
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";  // Assuming you have a 'users' table
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['username'] = $user;  // Store username in session
        header("Location: admin.html");  // Redirect to admin page
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password!";
    }
}

// Close the connection
$conn->close();
?>
