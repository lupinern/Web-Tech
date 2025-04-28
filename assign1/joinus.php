<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Join Us</title>
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
          <!-- Main content goes here -->
          <h1>Join Us</h1>
          <form action="submit_order.php" method="post" id="joinus-form">
            <!-- First Name -->
            <label for="joinus-first_name">First Name:</label>
            <input
              type="text"
              id="joinus-first_name"
              name="first_name"
              maxlength="25"
              pattern="[A-Za-z ]+"
              required
              placeholder="Ex: John"
            />
            <br /><br />

            <!-- Last Name -->
            <label for="joinus-last_name">Last Name:</label>
            <input
              type="text"
              id="joinus-last_name"
              name="last_name"
              maxlength="25"
              pattern="[A-Za-z ]+"
              required
              placeholder="Ex: Smith"
            />
            <br /><br />

            <!-- Email Address -->
            <label for="joinus-email">Email Address:</label>
            <input
              type="email"
              id="joinus-email"
              name="email"
              required
              placeholder="Ex: johnsmith123@mail.com"
            />
            <br /><br />

            <!-- Address Fieldset -->
            <fieldset id="joinus-address">
              <legend>Address</legend>

              <!-- Street Address -->
              <label for="joinus-street_address">Street Address:</label>
              <input
                type="text"
                id="joinus-street_address"
                name="street_address"
                maxlength="70"
                required
                placeholder="John Smith st., no. 5A, 12345"
              />
              <br /><br />

              <!-- City/Town -->
              <label for="joinus-city">City/Town:</label>
              <input
                type="text"
                id="joinus-city"
                name="city"
                maxlength="20"
                required
                placeholder="Ex: Kuching"
              />
              <br /><br />

              <!-- State -->
              <label for="joinus-state">State:</label>
              <select id="joinus-state" name="state" required>
                <option value="">Select your state</option>
                <option value="Johor">Johor</option>
                <option value="Kedah">Kedah</option>
                <option value="Kelantan">Kelantan</option>
                <option value="Malacca">Malacca</option>
                <option value="Negeri Sembilan">Negeri Sembilan</option>
                <option value="Pahang">Pahang</option>
                <option value="Penang">Penang</option>
                <option value="Perak">Perak</option>
                <option value="Perlis">Perlis</option>
                <option value="Sabah">Sabah</option>
                <option value="Sarawak">Sarawak</option>
                <option value="Selangor">Selangor</option>
                <option value="Terengganu">Terengganu</option>
                <option value="Kuala Lumpur">Kuala Lumpur</option>
                <option value="Labuan">Labuan</option>
                <option value="Putrajaya">Putrajaya</option>
              </select>
              <br /><br />

              <!-- Postcode -->
              <label for="joinus-postcode">Postcode:</label>
              <input
                type="text"
                id="joinus-postcode"
                name="postcode"
                pattern="\d{5}"
                required
                placeholder="123456"
              />
            </fieldset>
            <br /><br />

            <!-- Phone Number -->
            <label for="joinus-phone">Phone Number:</label>
            <input
              type="tel"
              id="joinus-phone"
              name="phone"
              maxlength="10"
              pattern="\d{10}"
              placeholder="0123456789"
              required
            />
            <br /><br />

            <!-- CV Upload -->
            <label for="CVfileUpload">Upload your CV:</label><br />
            <input
              type="file"
              id="CVfileUpload"
              name="CVfileUpload"
              accept=".pdf, .doc, .docx"
              required
            />
            <br /><br />

            <!-- Photo Upload -->
            <label for="PhotofileUpload">Upload your photo:</label><br />
            <input
              type="file"
              id="PhotofileUpload"
              name="PhotofileUpload"
              accept="image/png, image/jpeg"
              required
            />
            <br /><br />

            <!-- Submit and Reset Button -->
            <input type="submit" name="submit" id="joinus-submit" />
            <input type="reset" name="reset" id="joinus-reset" />
          </form>
        </div>
      </section>
    </main>
    <footer>
      <?php include("footer.php"); ?> 
  </footer>
  </body>
</html>
