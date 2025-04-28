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
            <h1 id="past_activities_header">Past Activities</h1>
            <section id="past_boxes">
                <!-- First activity -->
                <div id="box_past1" class="activities">
                    <!-- Image -->
                    <figure>
                        <img src="images/opening2.jpg" alt="Grand Opening 2" id="opening2">
                        <figcaption id="caption_opening2">Grand Opening of Second Outlet</figcaption>
                    </figure>
                    <!-- Content -->
                    <aside id="opening2_content">
                        <h2>Grand Opening of Brew & Go 2.0</h2>
                        <h3>Event Information:</h3>
                        <ol>
                            <li>Date: 22 Feburary 2025</li>
                            <li>Time: 10:30am</li>
                            <li>Venue: Plaze Merdeka (Level 1)</li>
                        </ol>
                    </aside>
                </div>
                <!-- Second activity -->
                <div id="box_past2" class="activities">
                    <!-- Image -->
                    <figure>
                        <img src="images/christmas.jpg" alt="Kuching Christmas Bazaar" id="christmas">
                        <figcaption id="caption_christmas">Kuching Christmas Bazaar</figcaption>
                    </figure>
                    <!-- Content -->
                    <aside id="christmas_content">
                        <h2>Kuching Christmas Bazaar (Vendor)</h2>
                        <h3>Event Information:</h3>
                        <ol>
                            <li>Date: 19 - 22 December 2024</li>
                            <li>Time: 5:00pm - 10:00pm</li>
                            <li>Venue: Travilion Group (Jalan Padungan)</li>
                        </ol>
                    </aside>
                </div>
                <!-- Third activity -->
                <div id="box_past3" class="activities">
                    <!-- Image -->
                    <figure>
                        <img src="images/seni_kita2.jpg" alt="Seni Kita 3rd Event" id="seni_kita2">
                        <figcaption id="caption_seni_kita2">Seni Kita: The Worlds We Weave</figcaption>
                    </figure>
                    <!-- Content -->
                    <aside id="seni_kita2_content">
                        <h2>Seni Kita: The Worlds We Weave (Vendor)</h2>
                        <h3>Event Information:</h3>
                        <ol>
                            <li>Date: 13 - 15 December 2024</li>
                            <li>Time: 10:00am - 7:00pm</li>
                            <li>Venue: Sarawak State Library (Pustaka)</li>
                        </ol>
                    </aside>
                </div>
                <dl id="info_past">
                    <dt>Past Activities</dt>
                    <dd>- Status: Concluded</dd>
                </dl>
            </section>
        </section>
    </main>
    <footer>
        <?php include("footer.php"); ?> 
    </footer>
</body>
</html>
