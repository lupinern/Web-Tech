<!DOCTYPE html>
<html>
<head>
    <title>Job Information Page</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <nav>
            <?php include("navigation.php"); ?> 
        </nav>
    </header>

    <h1>Job Applicants</h1>

    <table border="1">
        <tr>
            <th>No</th>
            <th width = "200px">Name</th>
            <th width = "150px">Email</th>
            <th width = "350px">Street Address</th>
            <th width = "80px">City/Town</th>
            <th width = "80px">State</th>
            <th width = "60px">Postcode</th>
            <th width = "120px">Phone Number</th>
            <th width = "120px">CV</th>
            <th width = "400px">Photo</th>
        </tr>

    <?php
        $db_server = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "brewngo";

        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

        $sql = "SELECT * FROM Joinus";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td> <?php echo $row["id"]; ?> </td>
        <td> <?php echo $row["first_name"]. " " . $row["last_name"]; ?> </td>
        <td> <?php echo $row["email"]; ?> </td>
        <td> <?php echo $row["street_address"]; ?> </td>
        <td> <?php echo $row["city"]; ?> </td>
        <td> <?php echo $row["states"]; ?> </td>
        <td> <?php echo $row["postcode"]; ?> </td>
        <td> <?php echo $row["phone_number"]; ?> </td>
        <td> <?php echo "<a href='" . htmlspecialchars($cvUpload) . "' target='_blank'>" . htmlspecialchars($cv) . "</a><br>"; ?> </td>
        <td> <?php echo "<img src='" . htmlspecialchars($imageUpload) . "' alt='Photo' style='width: 300px; height: auto;'><br>"; ?> </td>
    </tr>

    <?php
            }
        } else {
            echo "0 results";
            }

        mysqli_close($conn);
    ?>
    </table>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
    </body>
</html>