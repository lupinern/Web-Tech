<?php
// Database connection for table creation
$db_servername = "localhost";
$db_username = "root"; 
$db_password = "";
$dbname = "brewngo"; 

try {
  $conn = new PDO("mysql:host=$db_servername;dbname=$dbname", $db_username, $db_password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Check if the login table exists
  $tableCheck = $conn->query("SHOW TABLES LIKE 'login'");
  if ($tableCheck->rowCount() == 0) {
    // Table doesn't exist, create it
    $sql = "CREATE TABLE login (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(10) NOT NULL,
            password VARCHAR(25) NOT NULL
      )";

    $conn->exec($sql);

    $table_message = "Login table created successfully with admin account.";
  } else {
    // Check if admin table exists first
    $adminTableCheck = $conn->query("SHOW TABLES LIKE 'admin'");
    if ($adminTableCheck->rowCount() == 0) {
      // Admin table doesn't exist, create it
      $adminTableSql = "CREATE TABLE admin (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL,
    password VARCHAR(25) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )";
      $conn->exec($adminTableSql);

      // Insert default admin into admin table
      $adminInsertSql = "INSERT INTO admin (username, password) VALUES ('admin', 'admin')";
      $conn->exec($adminInsertSql);
      $table_message = "Admin table created with default admin account.";
    } else {
      // Check if admin account exists in admin table
      $adminCheck = $conn->query("SELECT * FROM admin WHERE username = 'admin'");
      if ($adminCheck->rowCount() == 0) {
        // No admin found, create one
        $adminInsertSql = "INSERT INTO admin (username, password) VALUES ('admin', 'admin')";
        $conn->exec($adminInsertSql);
        $table_message = "Default admin account created in admin table.";
      } else {
        $table_message = "Admin account already exists in admin table.";
      }
    }
  }
} catch (PDOException $e) {
  $table_message = "Error: " . $e->getMessage();
}

$conn = null; // Close the connection
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
