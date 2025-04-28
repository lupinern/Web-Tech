<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew and Go Homepage</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <nav>
            <?php include("navigation.php"); ?>
        </nav>
    </header>
    <main>
        <section class="content">
            <h1 id="coming_soon_header">Coming Soon!</h1>
            <section id="box_coming1">
                <!-- Image -->
                <figure>
                    <img src="images/brewngo.jpg" alt="brewngo" id="brew">
                    <figcaption id="caption_brewngo">Brew & Go. Coffee</figcaption>
                </figure>
                <!-- Content -->
                <aside id="box_coming2">
                    <h2 id="text_coming1">No New Activities Planned</h2>
                    <h3 id="text_coming2">Follow our socials to get updated on upcoming activities</h3>
                    <ol id="info_coming">
                        <li>Our Official Facebook Account</li>
                        <a href="https://www.facebook.com/people/Brew-Go-Coffee/61554234958482/">
                            <img src="images/facebook.jpg" alt="facebook" id="fb_link">
                        </a>
                        <li>Our Official Instagram Account</li>
                        <a href="https://www.instagram.com/brewngo.coffee/">
                            <img src="images/instagram.jpg" alt="instagram" id="insta_link">
                        </a>
                    </ol>
                    <dl id="box_coming3">
                        <dt>Upcoming activity</dt>
                        <dd>- Yet to be revealed</dd>
                    </dl>
            </section>
        </section>
    </main>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
</html>