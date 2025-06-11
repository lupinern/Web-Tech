<?php
// Start session for admin authentication
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Adjust as per your MySQL setup
$password = ""; // Adjust as per your MySQL setup
$dbname = "brewngo"; // Updated to match the database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if user is logged in and is an admin
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: login.php");
    exit;
}

// Get current datetime
$currentDateTime = date("Y-m-d H:i:s");

// Fetch all login records
$result = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");
$logins = [];
while ($row = mysqli_fetch_assoc($result)) {
    $logins[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Login history</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <?php include("navigation.php"); ?>
        </nav>
    </header>
    <main>
        <section class="container">
            <h1>View Login History</h1>
            <?php if (empty($logins)): ?>
                <p>No users found.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logins as $login): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($login['id']); ?></td>
                                <td><?php echo htmlspecialchars($login['username']); ?></td>
                                <td><?php echo htmlspecialchars($login['password']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>
