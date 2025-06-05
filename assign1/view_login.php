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

	// Get current datetime
	$currentDateTime = date("Y-m-d H:i:s");

	// Fetch all enquiries
	try {
    	$stmt = $conn->query("SELECT * FROM login ORDER BY id DESC");
    	$logins = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
    	die("Query failed: " . $e->getMessage());
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
                <p>No enquiries found.</p>
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