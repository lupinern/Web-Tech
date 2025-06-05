<?php
  // Database connection for table creation
  $db_servername = "localhost";
  $db_username = "root"; // Adjust as per your MySQL setup
  $db_password = ""; // Adjust as per your MySQL setup
  $dbname = "brewngo"; // Database name as per your setup

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
		    // Optional: Display a message for debugging (remove in production)
		    $table_message = "Login table created successfully.";
	    } else {
		    $table_message = "Login table already exists.";
	    }
    } catch (PDOException $e) {
	    $table_message = "Error creating table: " . $e->getMessage();
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
          <form action="login_process.php" method="post" id="login-form">
            <!-- Login -->
            <label for="login-username">Login:</label>
            <input
              type="text"
              id="login-username"
              name="username"
              maxlength="10"
              pattern="[A-Za-z]{1,10}"
              required
              placeholder="Enter your username"
            />
            <br /><br />

            <!-- Password -->
            <label for="login-password">Password:</label>
            <input
              type="password"
              id="login-password"
              name="password"
              maxlength="25"
              pattern="[A-Za-z]{1,25}"
              required
              placeholder="Enter your password"
            />
            <br /><br />

            <!-- Remember Me -->
            <label for="remember-me">
              <input
                type="checkbox"
                id="remember-me"
                name="remember_me"
              />Remember Me</label
            >
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
