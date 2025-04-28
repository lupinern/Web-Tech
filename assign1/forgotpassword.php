<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Title</title>
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
          <h1>Forgot Password</h1>
          <form
            action="process_forgot_password.php"
            method="post"
            id="forgot-password-form"
          >
            <!-- Email Address -->
            <label for="forgot-email">Enter your email address:</label>
            <input
              type="email"
              id="forgot-email"
              name="email"
              required
              placeholder="Enter your registered email"
            />
            <br /><br />

            <!-- Submit Button -->
            <input type="submit" value="Reset Password" />
            <br /><br />

            <!-- Back to Login -->
            <p>Remembered your password? <a href="login.html">Login</a></p>
          </form>
        </div>
      </section>
    </main>
    <footer>
      <?php include("footer.php"); ?> 
  </footer>
  </body>
</html>