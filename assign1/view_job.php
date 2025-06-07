<?php
// Start session for admin authentication
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Adjust as per your MySQL setup
$password = ""; // Adjust as per your MySQL setup
$dbname = "brewngo"; // Updated to match the database name

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch all enquiries
try {
    $stmt = $conn->query("SELECT * FROM JoinUs ORDER BY id ASC");
    $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Applicants</title>
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
            <h1>Job Applicants</h1>
            <?php if (empty($jobs)): ?>
                <p>No applicants found.</p>
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
                            <th>Phone Number</th>
                            <th>CV</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jobs as $job): ?>
                            <tr>
                                <td> <?php echo htmlspecialchars($job["id"]); ?> </td>
                                <td> <?php echo htmlspecialchars($job["first_name"]); ?> </td>
                                <td> <?php echo htmlspecialchars($job["last_name"]); ?> </td>
                                <td> <?php echo htmlspecialchars($job["email"]); ?> </td>
                                <td> <?php echo htmlspecialchars($job["street_address"]); ?> </td>
                                <td> <?php echo htmlspecialchars($job["city"]); ?> </td>
                                <td> <?php echo htmlspecialchars($job["states"]); ?> </td>
                                <td> <?php echo htmlspecialchars($job["postcode"]); ?> </td>
                                <td> <?php echo htmlspecialchars($job["phone_number"]); ?> </td>
                                <td> <a href='<?php echo htmlspecialchars($job["cv"]); ?>' target='_blank'>Download Applicant's CV</a> </td>
                                <td> <img src='<?php echo htmlspecialchars($job['photo']); ?>' alt="Applicant's Photo" style='width: 300px; margin: auto;'> </td>
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