<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation - Brew and Go</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <nav>
            <?php include("navigation.php"); ?>
        </nav>
    </header>
    <main>
        <section class="content">
            <div class="form-container">
                <?php
                // Database connection
                $db_server = "localhost";
                $db_user = "root";
                $db_password = "";
                $db_name = "brewngo";

                // Connect to database
                $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

                // Check connection
                if (!$conn) {
                    die("<h2>Connection failed:</h2><p>" . mysqli_connect_error() . "</p>");
                }

                // Check if members table exists and create if needed
                try {
                    $tableCheck = $conn->query("SHOW TABLES LIKE 'membership'");

                    if ($tableCheck->num_rows == 0) {
                        // Create members table
                        $createTableSQL = "CREATE TABLE membership (
                            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            first_name VARCHAR(50) NOT NULL,
                            last_name VARCHAR(50) NOT NULL,
                            email VARCHAR(100) NOT NULL,
                            login_id VARCHAR(50) NOT NULL,
                            password VARCHAR(50) NOT NULL,
                            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        )";

                        if ($conn->query($createTableSQL) === TRUE) {
                            // Optional: Log table creation
                            error_log("Members table created successfully.");
                        } else {
                            // Handle table creation error
                            header("Location: registration.php?error=Database setup failed: " . urlencode($conn->error));
                            exit();
                        }
                    }
                } catch (Exception $e) {
                    // Handle table creation error
                    header("Location: registration.php?error=Database setup failed: " . urlencode($e->getMessage()));
                    exit();
                }

                // Process form data
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Get form data
                    $first_name = mysqli_real_escape_string($conn, $_POST['registration-first_name']);
                    $last_name = mysqli_real_escape_string($conn, $_POST['registration-last_name']);
                    $email = mysqli_real_escape_string($conn, $_POST['registration-email']);
                    $login_id = mysqli_real_escape_string($conn, $_POST['registration-login_id']);
                    $password = mysqli_real_escape_string($conn, $_POST['registration-password']);

                    // Insert data into database
                    $sql = "INSERT INTO membership (first_name, last_name, email, login_id, password)
        VALUES ('$first_name', '$last_name', '$email', '$login_id', '$password')";

                    if (mysqli_query($conn, $sql)) {
                        echo "<h1>Registration Successful!</h1>";
                        echo "<p>Thank you for registering with Brew & Go.</p>";

                        // Display all submitted details
                        echo "<div class='registration-details'>";
                        echo "<h2>Your Registration Details:</h2>";
                        echo "<p><strong>First Name:</strong> " . htmlspecialchars($first_name) . "</p>";
                        echo "<p><strong>Last Name:</strong> " . htmlspecialchars($last_name) . "</p>";
                        echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
                        echo "<p><strong>Login ID:</strong> " . htmlspecialchars($login_id) . "</p>";
                        echo "<p><strong>Password:</strong> " . str_repeat("*", strlen($password)) . "</p>";
                        echo "</div>";

                        echo "<p>We look forward to serving you our premium coffee products.</p>";
                        echo "<p><a href='index.php' class='card-btn'>Return to Home Page</a></p>";
                    } else {
                        echo "<h1>Registration Error</h1>";
                        echo "<p>Error: " . mysqli_error($conn) . "</p>";
                        echo "<p><a href='registration.php' class='card-btn'>Try Again</a></p>";
                    }
                }

                mysqli_close($conn);
                ?>
            </div>
        </section>
    </main>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>
