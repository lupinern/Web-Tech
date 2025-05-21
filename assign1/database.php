<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";

    $conn = mysqli_connect($db_server, $db_user, $db_password);

    $sql = "CREATE DATABASE IF NOT EXISTS brewngo";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>