<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "";

// Connect without selecting a database
$conn = mysqli_connect($db_server, $db_user, $db_password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS brewngo";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully or already exists";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
