<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Brew - Brew and Go</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <nav>
            <?php include("navigation.php"); ?> 
        </nav>
    </header>
    <main>
        <div class="product-hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/Aerocano.jpeg');">
            <div class="hero-content">
                <h1>Basic Brew</h1>
                <h2>Classic Coffee Staples</h2>
            </div>
        </div>

        <div class="product-container">
            <section class="product-description">
                <h2>Our Classic Coffee Selection</h2>
                <p>Experience the timeless flavors of our Basic Brew collection - simple, pure, and expertly crafted coffee that stands the test of time.</p>
                
                <figure>
                    <img src="images/Aerocano.jpeg" alt="Basic Brew Coffee Cup">
                    <figcaption>Our signature Basic Brew "Aerocano" - smooth and balanced</figcaption>
                </figure>
                
                <h3>Why Choose Basic Brew?</h3>
                <ol>
                    <li>Consistent quality you can rely on</li>
                    <li>Perfect balance of flavor and aroma</li>
                    <li>Affordable premium coffee</li>
                    <li>Quick preparation without compromising taste</li>
                </ol>
            </section>

            <section class="product-details">
                <h2>Menu Details</h2>
                <dl>
                    <dt>Americano</dt>
                    <dd>Espresso shots topped with hot water for a rich, smooth flavor with a bold aroma</dd>
                    
                    <dt>Latte</dt>
                    <dd>Espresso with steamed milk and a light layer of foam for a creamy, mild coffee experience</dd>
                    
                    <dt>Cappuccino</dt>
                    <dd>Perfectly balanced with equal parts espresso, steamed milk, and thick milk foam</dd>
                    
                    <dt>Aerocano</dt>
                    <dd>Our signature drink - espresso poured over chilled sparkling water for a refreshing twist</dd>
                    
                    <dt>Aero-latte</dt>
                    <dd>A creamy variation of our Aerocano with added steamed milk for a smoother texture</dd>
                </dl>
            </section>

            <aside class="product-tips">
                <h3>Brewing Tips</h3>
                <p>For the best Basic Brew experience at home:</p>
                <ul>
                    <li>Use freshly ground beans within 15 minutes of brewing</li>
                    <li>Water temperature should be between 195-205°F</li>
                    <li>Clean your equipment regularly for pure flavor</li>
                    <li>Experiment with brew time to find your perfect strength</li>
                </ul>
                <p>Visit our <a href="joinus.html">Join Us</a> page for brewing workshops!</p>
            </aside>
        </div>
    </main>
    <footer>
        <?php include("footer.php"); ?> 
    </footer>
</body>
</html>
