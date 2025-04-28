<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile 1</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <nav>
          <?php include("navigation.php"); ?> 
        </nav>
    </header>
    <main>
        <div class="profile-container">
          <div class="profile-header3">
            <h1>Aloysius Fung Khang Xi</h1>
            <h2>104395807</h2>
            <h3>Bachelors Of Computer Science</h3>
            <img
              src="images/aloysius_fung.jpg"
              alt="Aloysius Fung Khang Xi"
              class="profile-pic"
            />
          </div>
  
          <section class="profile-bio3">
            <h3>About Aloysius</h3>
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
                  <td>19</td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td>Male</td>
                </tr>
                <tr>
                  <td>Nationality</td>
                  <td>Malaysian</td>
                </tr>
                <tr>
                  <td>Hometown</td>
                  <td>
                    Kuching is my hometown and the city has a special place in my heart. Kuching has many
                    unique cultures because there are many different races living here, all living in harmony.
                    The food in Kuching is amazing as well, offering a huge variety of dishes from different races.
                  </td>
                </tr>
                <tr>
                  <td>Greatest Achievment</td>
                  <td>3.75 CGPA in Foundation</td>
                </tr>
                <tr>
                  <td>Favorite Music</td>
                  <td>
                    <ul>
                      <li>heart pt.6 ~Kendrick Lamar</li>
                      <li>Gimme Love ~Joji</li>
                      <li>Like Him ~Tyler, The Creator</li>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td>Favorite Movies</td>
                  <td>
                    <ul>
                      <li>A Silent Voice</li>
                      <li>The Angry Birds Movie</li>
                      <li>Your Name.</li>
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
