<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brewngo";

// Function to sanitize input
function sanitize($data)
{
    return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_username = sanitize($_POST['username']);
    $login_password = sanitize($_POST['password']);

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // First check admin table
        $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
        $stmt->execute([$login_username, $login_password]);

        if ($stmt->rowCount() > 0) {
            // Admin login successful
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set session variables
            $_SESSION['user_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];
            $_SESSION['logged_in'] = true;
            $_SESSION['is_admin'] = true;

            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Check the members table for regular users
            $stmt = $conn->prepare("SELECT * FROM members WHERE login_id = ? AND password = ?");
            $stmt->execute([$login_username, $login_password]);

            if ($stmt->rowCount() > 0) {
                // Member login successful
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['login_id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['logged_in'] = true;
                $_SESSION['is_admin'] = false;

                // Redirect to home page
                header("Location: index.php");
                exit();
            } else {
                // Login failed
                header("Location: login.php?error=Invalid username or password&username=" . urlencode($login_username));
                exit();
            }
        }
    } catch (PDOException $e) {
        header("Location: login.php?error=Database error: " . urlencode($e->getMessage()));
        exit();
    }
} else {
    // Not a POST request
    header("Location: login.php");
    exit();
}
?>
