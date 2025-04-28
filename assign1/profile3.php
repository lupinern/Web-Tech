<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile 1</title>
    <link rel="stylesheet" href="styles/style.css" />
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
          <h1>Jason Hernando Kwee</h1>
          <h2>104396994</h2>
          <h3>Bachelors Of Computer Science</h3>
          <img
            src="images/person3.png"
            alt="Jason Hernando Kwee"
            class="profile-pic"
          />
        </div>

        <section class="profile-bio3">
          <h3>About Jason</h3>
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
                <td>Indonesian</td>
              </tr>
              <tr>
                <td>Hometown</td>
                <td>
                  Pontianak is a city located on the island of Borneo in West
                  Kalimantan, Indonesia. Known as the “Equator City,” it sits
                  right on the equator line, marked by the iconic Equator
                  Monument. The city is rich in cultural diversity, with strong
                  influences from Malay, Dayak, and Chinese communities.
                  Pontianak is famous for its riverside lifestyle, vibrant
                  street food, and traditional wooden stilt houses along the
                  Kapuas River — the longest river in Indonesia.
                </td>
              </tr>
              <tr>
                <td>Greatest Achievement</td>
                <td>Still living.</td>
              </tr>
              <tr>
                <td>Favorite Music</td>
                <td>
                  <ul>
                    <li>Romantic Homicide ~d4vd</li>
                    <li>NITROUS ~Joji</li>
                    <li>Always ~Daniel Caesar</li>
                  </ul>
                </td>
              </tr>
              <tr>
                <td>Favorite Movies</td>
                <td>
                  <ul>
                    <li>La La Land</li>
                    <li>Ratatouille</li>
                    <li>A Minecraft Movie</li>
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

