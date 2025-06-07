<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "";

// Connect without selecting a database
$conn = mysqli_connect($db_server, $db_user, $db_password);

// Check if connection failed
if (!$conn) {
    die("Connection failed");
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS brewngo";
if (!mysqli_query($conn, $sql)) {
    echo "Error creating database";
}

mysqli_close($conn);
?>