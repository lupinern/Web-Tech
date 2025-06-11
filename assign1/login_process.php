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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="styles/style.css" />
  <style>
    .error {
      color: red;
      font-size: 0.9em;
    }

    .success {
      color: green;
      font-size: 0.9em;
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
      <div class="form-container">
        <h1>Login</h1>
        <?php if (isset($_GET['error'])): ?>
          <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
        <form action="login_process.php" method="post" id="login-form">
          <!-- Login -->
          <input type="text" id="login-username" name="username" maxlength="10" pattern="[A-Za-z]{1,10}" required
            placeholder="Enter your username"
            value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>" />
          <br /><br />

          <!-- Password -->
          <label for="login-password">Password:</label>
          <input type="password" id="login-password" name="password" maxlength="25" pattern="[A-Za-z]{1,25}" required
            placeholder="Enter your password" />
          <br /><br />

          <!-- Submit Button -->
          <input type="submit" value="Login" />
          <br /><br />

          <!-- Sign-Up Link -->
          <p>Not a member? <a href="registration.php">Sign Up</a></p>
        </form>
      </div>
    </section>
  </main>
  <footer>
    <?php include("footer.php"); ?>
  </footer>
</body>

</html>
