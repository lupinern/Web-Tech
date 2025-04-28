<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page 1 - Luthfi Bahri</title>
    <link rel="stylesheet" href="styles/style.css">
<body>
    <header>
        <nav>
          <?php include("navigation.php"); ?> 
        </nav>
    </header>
    <main>
        <div class="profile-container">
          <div class="profile-header3">
            <h1>Luthfi Bahri</h1>
            <h2>100088857</h2>
            <h3>Bachelors Of Computer Science</h3>
            <img
              src="images/person1.jpeg"
              alt="Luthfi Bahri"
              class="profile-pic"
            />
          </div>
  
          <section class="profile-bio3">
            <h3>About Luthfi</h3>
            <table>
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Age</td>
                  <td>26</td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td>Male</td>
                </tr>
                <tr>
                  <td>Nationality</td>
                  <td>Indonesian</td>
                </tr>
                <tr>
                  <td>Hometown</td>
                  <td>
                    Though my parents are Indonesian, I was born and raised in Qatar my whole life. It is one of the middle eastern gulf countries that is rapidly growing despite it's small footprint.
                  </td>
                </tr>
                <tr>
                  <td>Greatest Achievement</td>
                  <td>Probably brewing matcha and coffee for my friends, I enjoy making drinks for others.</td>
                </tr>
                <tr>
                  <td>Favorite Music</td>
                  <td>
                    <ul>
                        <li>Wave To Earth</li>
                        <li>Bring Me The Horizon</li>
                        <li>Frank Ocean</li>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td>Favorite Movies</td>
                  <td>
                    <ul>
                        <li>The Prestige</li>
                        <li>Interstellar</li>
                        <li>Pulp Fiction</li>
                    </ul>
                  </td>
                </tr>
              </tbody>
            </table>
          </section>
        </div>
      </main>

    <footer>
      <?php include("footer.php"); ?> 
    </footer>
        
   
</body>
</html>
