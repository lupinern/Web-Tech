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
            <h1 id="current_header">Current Activity</h1>
            <section id="box_current1">
                <!-- Image -->
                <figure>
                    <img src="images/seni_kita.jpg" alt="Seni Kita Fourth Event" id="seni_kita">
                    <figcaption id="caption_senikita">Mini Seni Kita: Open HAUS</figcaption>
                </figure>
                <!-- Content -->
                <aside id="box_current2">
                    <h2 id="text_current1">Mini Seni Kita: Open HAUS (Vendor)</h2>
                    <h3 id="text_current2">Event Information:</h3>
                    <ol id="info_current">
                        <li>Date: 29 March 2025</li>
                        <li>Time: 3pm - 10pm</li>
                        <li>Venue: Yun Phin Building, Padungan</li>
                    </ol>
                    <p>*This event has concluded</p>
                    <dl id="box_current3">
                        <dt>Current activity</dt>
                        <dd>- Mini Seni Kita: Open HAUS</dd>
                    </dl>
                </aside>
            </section>
    </main>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
</html>