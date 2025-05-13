<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "brewngo";

    $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

    if($conn){
        echo "The database is connected";
    }
    else{
        echo "The database failed to connect";
    }
?>