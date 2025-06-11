<?php
// Database connection
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "brewngo";

// Connect to database
$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables
$success_message = "";
$error_message = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Sanitize and get form data
    $first_name = mysqli_real_escape_string($conn, $_POST['registration-first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['registration-last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['registration-email']);
    $login_id = mysqli_real_escape_string($conn, $_POST['registration-login_id']);
    $password = mysqli_real_escape_string($conn, $_POST['registration-password']);

    // Server-side validation
    if (empty($first_name) || !preg_match("/^[A-Za-z]{1,25}$/", $first_name)) {
        $error_message = "First name must be 1-25 alphabetic characters.";
    } elseif (empty($last_name) || !preg_match("/^[A-Za-z]{1,25}$/", $last_name)) {
        $error_message = "Last name must be 1-25 alphabetic characters.";
    } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Please enter a valid email address.";
    } elseif (empty($login_id) || !preg_match("/^[A-Za-z]{1,10}$/", $login_id)) {
        $error_message = "Login ID must be 1-10 alphabetic characters.";
    } elseif (empty($password) || !preg_match("/^[A-Za-z]{1,25}$/", $password)) {
        $error_message = "Password must be 1-25 alphabetic characters.";
    } else {
        // Check if login_id already exists
        $check_stmt = mysqli_prepare($conn, "SELECT id FROM membership WHERE login_id = ?");
        mysqli_stmt_bind_param($check_stmt, "s", $login_id);
        mysqli_stmt_execute($check_stmt);
        $result = mysqli_stmt_get_result($check_stmt);
        
        if (mysqli_num_rows($result) > 0) {
            $error_message = "Login ID already exists. Please choose a different one.";
        } else {
            // Insert into database
            $stmt = mysqli_prepare($conn, "INSERT INTO membership (first_name, last_name, email, login_id, password) VALUES (?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $login_id, $password);
            
            if (mysqli_stmt_execute($stmt)) {
                $success_message = "Registration successful! You can now login with your credentials.";
            } else {
                $error_message = "Error: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_stmt_close($check_stmt);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        .message-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }
        .success {
            color: green;
            background-color: #d4edda;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            background-color: #f8d7da;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #332a21;
            color: white;
            text-decoration: none;
            border-radius: 5px;
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
        <section class="content">
            <div class="message-container">
                <?php if (!empty($success_message)): ?>
                    <div class="success">
                        <h2>Success!</h2>
                        <p><?php echo htmlspecialchars($success_message); ?></p>
                    </div>
                    <a href="login.php" class="back-link">Go to Login</a>
                <?php elseif (!empty($error_message)): ?>
                    <div class="error">
                        <h2>Registration Failed</h2>
                        <p><?php echo htmlspecialchars($error_message); ?></p>
                    </div>
                    <a href="registration.php" class="back-link">Try Again</a>
                <?php else: ?>
                    <div class="error">
                        <h2>Invalid Request</h2>
                        <p>No registration data received.</p>
                    </div>
                    <a href="registration.php" class="back-link">Go to Registration</a>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
</html>
