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

// Fetch all enquiries
$result = mysqli_query($conn, "SELECT * FROM enquiry ORDER BY id DESC");
$enquiries = [];
while ($row = mysqli_fetch_assoc($result)) {
    $enquiries[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Enquiries</title>
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
            <h1>View Enquiries</h1>
            <?php if (empty($enquiries)): ?>
                <p>No enquiries found.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Street Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Phone</th>
                            <th>Enquiry Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($enquiries as $enquiry): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($enquiry['id']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['first_name']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['last_name']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['email']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['street_address']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['city']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['state']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['postcode']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['phone']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['enquiry_type']); ?></td>
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
