<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "brewngo";

// Connect to database
$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create admin table
$sql = "CREATE TABLE IF NOT EXISTS admin (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL,
    password VARCHAR(25) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'admin' created successfully or already exists<br>";

    // Check if there's already an admin
    $check = mysqli_query($conn, "SELECT * FROM admin");
    if (mysqli_num_rows($check) == 0) {
        // Insert default admin
        $insert = "INSERT INTO admin (username, password) VALUES ('Admin', 'Admin')";
        if (mysqli_query($conn, $insert)) {
            echo "Default admin account created successfully";
        } else {
            echo "Error creating admin account: " . mysqli_error($conn);
        }
    } else {
        echo "Admin account already exists";
    }
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>