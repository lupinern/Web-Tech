<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css" />
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
          <form action="process_login.php" method="post" id="login-form">
            <!-- Login -->
            <label for="login-username">Login:</label>
            <input
              type="text"
              id="login-username"
              name="username"
              maxlength="10"
              pattern="[A-Za-z]+"
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
              pattern="[A-Za-z]+"
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
            <p>Not a member? <a href="registration.html">Sign Up</a></p>
          </form>
        </div>
      </section>
    </main>
    <footer>
      <?php include("navigation.php"); ?> 
  </footer>
  </body>
</html>
