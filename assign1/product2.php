<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisan Brew - Brew and Go</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <nav>
            <?php include("navigation.php"); ?> 
        </nav>
    </header>
    <main>
        <div class="product-hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/Butterscotch\ latte_1.jpeg');">
            <div class="hero-content">
                <h1>Artisan Brew</h1>
                <h2>Craft Coffee Creations</h2>
            </div>
        </div>

        <div class="product-container">
            <section class="product-description">
                <h2>Our Signature Creations</h2>
                <p>Discover our innovative Artisan Brew collection - where traditional coffee meets creative craftsmanship for unique flavor experiences.</p>
                
                <figure>
                    <img src="images/Butterscotch latte_1.jpeg" alt="Artisan Brew Coffee">
                    <figcaption>Our signature "Butterscotch Latte" - a creamy, caramel delight</figcaption>
                </figure>
                
                <h3>Why Try Artisan Brew?</h3>
                <ol>
                    <li>Innovative flavor combinations you won't find elsewhere</li>
                    <li>Handcrafted with premium ingredients</li>
                    <li>Seasonal specials that rotate throughout the year</li>
                    <li>Perfect balance of creativity and coffee craftsmanship</li>
                </ol>
            </section>

            <section class="product-details">
                <h2>Menu Details</h2>
                <dl>
                    <dt>Butterscotch Latte</dt>
                    <dd>Velvety smooth latte infused with homemade butterscotch syrup</dd>
                    
                    <dt>Butterscotch Creme</dt>
                    <dd>Decadent butterscotch flavor with whipped cream topping</dd>
                    
                    <dt>Mint Latte</dt>
                    <dd>Refreshing peppermint paired with rich espresso and steamed milk</dd>
                    
                    <dt>Vienna Latte</dt>
                    <dd>Classic European-style latte with a hint of vanilla and cinnamon</dd>
                    
                    <dt>Pistachio Latte</dt>
                    <dd>Nutty pistachio flavor blended with our signature espresso</dd>
                    
                    <dt>Strawberry Latte</dt>
                    <dd>Seasonal fresh strawberry puree mixed with creamy latte</dd>
                    
                    <dt>Mocha</dt>
                    <dd>Rich chocolate and espresso combination with steamed milk</dd>
                    
                    <dt>Mint Mocha</dt>
                    <dd>Cool mint chocolate twist on our classic mocha</dd>
                    
                    <dt>Orange Mocha</dt>
                    <dd>Zesty orange flavor blended with chocolate and espresso</dd>
                    
                    <dt>Yuzu Americano</dt>
                    <dd>Japanese citrus-infused americano for a refreshing kick</dd>
                    
                    <dt>Cheese Americano</dt>
                    <dd>Unique Korean-inspired cream cheese foam topping on americano</dd>
                    
                    <dt>Orange Americano</dt>
                    <dd>Bright orange zest complements the bold americano flavor</dd>
                    
                    <dt>Extra Espresso Shot</dt>
                    <dd>Add an additional shot to any drink for extra intensity</dd>
                </dl>
            </section>

            <aside class="product-tips">
                <h3>Craft Coffee Tips</h3>
                <p>To fully appreciate our Artisan Brew creations:</p>
                <ul>
                    <li>Try different drinks seasonally for new experiences</li>
                    <li>Ask your barista for pairing recommendations</li>
                    <li>Enjoy specialty drinks at the recommended temperature</li>
                    <li>Consider trying without sugar first to appreciate the flavors</li>
                </ul>
                <p>Follow us on social media for limited-time offerings!</p>
            </aside>
        </div>
    </main>
    <footer>
        <?php include("footer.php"); ?> 
    </footer>
</body>
</html>
