<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "brewngo";

    $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

    if(!$conn){
        die("Connection failed");
    }

    $sql = "CREATE TABLE IF NOT EXISTS JoinUs(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        street_address VARCHAR(100) NOT NULL,
        city VARCHAR(20) NOT NULL,
        states VARCHAR(20) NOT NULL,
        postcode VARCHAR(5) NOT NULL,
        phone_number INT(11) NOT NULL,
        cv VARCHAR(50) NOT NULL,
        photo VARCHAR(50) NOT NULL
    )";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>