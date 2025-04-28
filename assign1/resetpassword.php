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
          <h1>Reset Password</h1>
          <form
            action="process_reset_password.php"
            method="post"
            id="reset-password-form"
          >
            <!-- New Password -->
            <label for="new-password">New Password:</label>
            <input
              type="password"
              id="new-password"
              name="new_password"
              minlength="8"
              maxlength="25"
              required
              placeholder="Enter your new password"
            />
            <br /><br />

            <!-- Confirm Password -->
            <label for="confirm-password">Confirm Password:</label>
            <input
              type="password"
              id="confirm-password"
              name="confirm_password"
              minlength="8"
              maxlength="25"
              required
              placeholder="Re-enter your new password"
            />
            <br /><br />

            <!-- Submit Button -->
            <input type="submit" value="Reset Password" />
          </form>
        </div>
      </section>
    </main>
    <footer>
      <?php include("footer.php"); ?> 
  </footer>
  </body>
</html>
