<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Membership Registration</title>
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
        <div class="form-image-wrapper">
          <div class="image-box">
            <img src="images/Join_Member1.jpg" alt="Registration Visual" />
          </div>
          <div class="form-container">
            <form
              action="submit_order.php"
              method="post"
              id="registration-form"
            >
              <!-- Main content goes here -->
              <h1>Membership Registration Form</h1>
              <h2>Welcome! Please sign up.</h2>
              <!-- First Name -->
              <p>
                <label for="registration-first_name">First Name</label><br />
                <input
                  type="text"
                  id="registration-first_name"
                  name="registration-first_name"
                  maxlength="25"
                  placeholder="Ex: John"
                  pattern="[A-Za-z]{1,25}"
                  required="required"
                />
              </p>

              <!-- Last Name -->
              <p>
                <label for="registration-last_name">Last Name</label><br />
                <input
                  type="text"
                  id="registration-last_name"
                  name="registration-last_name"
                  maxlength="25"
                  placeholder="Ex: Smith"
                  pattern="[A-Za-z]{1,25}"
                  required="required"
                />
              </p>

              <!-- Email Address -->
              <p>
                <label for="registration-email">Email address</label><br />
                <input
                  type="email"
                  id="registration-email"
                  name="registration-email"
                  placeholder="Ex: johnsmith123@mail.com"
                  required="required"
                />
              </p>

              <!-- Login ID -->
              <p>
                <label for="registration-login_id">Login ID</label><br />
                <input
                  type="text"
                  id="registration-login_id"
                  name="registration-login_id"
                  maxlength="10"
                  placeholder="Ex: ABCDEFGHIJ"
                  pattern="[A-Za-z]{1,10}"
                  required="required"
                />
              </p>

              <!-- Password -->
              <p>
                <label for="registration-password">Password</label><br />
                <input
                  type="text"
                  id="registration-password"
                  name="registration-password"
                  maxlength="25"
                  placeholder="Ex: johnsmith (Alphabets only)"
                  pattern="[A-Za-z]{1,25}"
                  required="required"
                />
              </p>

              <!-- Submit and Reset Button -->
              <input type="submit" name="submit" id="registration-submit" />
              <input
                type="reset"
                name="reset"
                id="registration-reset"
              /><br /><br />
            </form>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <?php include("footer.php"); ?> 
  </footer>
  </body>
</html>
