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
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
      throw new Exception("Connection failed: " . mysqli_connect_error());
    }

    // First check admin table
    $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $login_username, $login_password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
      // Admin login successful
      $admin = mysqli_fetch_assoc($result);

      // Set session variables
      $_SESSION['user_id'] = $admin['id'];
      $_SESSION['username'] = $admin['username'];
      $_SESSION['logged_in'] = true;
      $_SESSION['is_admin'] = true;

      // Record login in login table
      $isAdmin = 1;
      $passwordMask = "******"; // Create a variable for the password mask
      $insertStmt = mysqli_prepare($conn, "INSERT INTO login (username, password, is_admin) VALUES (?, ?, ?)");
      mysqli_stmt_bind_param($insertStmt, "ssi", $login_username, $passwordMask, $isAdmin);

      mysqli_close($conn);
      header("Location: admin_dashboard.php");
      exit();
    } else {
      // Check the members table for regular users
      mysqli_stmt_close($stmt);
      $stmt = mysqli_prepare($conn, "SELECT * FROM members WHERE login_id = ? AND password = ?");
      mysqli_stmt_bind_param($stmt, "ss", $login_username, $login_password);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) > 0) {
        // Member login successful
        $user = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['login_id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['logged_in'] = true;
        $_SESSION['is_admin'] = false;

        mysqli_close($conn);
        header("Location: index.php");
        exit();
      } else {
        // Login failed
        mysqli_close($conn);
        header("Location: login.php?error=Invalid username or password&username=" . urlencode($login_username));
        exit();
      }
    }
  } catch (Exception $e) {
    if (isset($conn)) {
      mysqli_close($conn);
    }
    header("Location: login.php?error=Database error: " . urlencode($e->getMessage()));
    exit();
  }
} else {
  // Not a POST request
  header("Location: login.php");
  exit();
}
?>
