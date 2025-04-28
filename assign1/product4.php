<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hot Beverages - Brew and Go</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <nav>
            <?php include("navigation.php"); ?> 
        </nav>
    </header>
    <main>
        <div class="product-hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/americano.jpg');">
            <div class="hero-content">
                <h1>Hot Beverages</h1>
                <h2>Warm and Comforting</h2>
            </div>
        </div>

        <div class="product-container">
            <section class="product-description">
                <h2>Our Warming Selection</h2>
                <p>Discover our Hot Beverages collection - perfect companions for chilly days, morning rituals, or whenever you need a warm embrace in a cup.</p>
                
                <figure>
                    <img src="images/americano.jpg" alt="Hot Beverage">
                    <figcaption>Our classic "Americano" - simple and satisfying</figcaption>
                </figure>
                
                <h3>Why Choose Our Hot Beverages?</h3>
                <ol>
                    <li>Perfect serving temperature every time</li>
                    <li>Quality ingredients for maximum flavor</li>
                    <li>Comforting warmth in every sip</li>
                    <li>Pairs perfectly with our baked goods</li>
                </ol>
            </section>

            <section class="product-details">
                <h2>Menu Details</h2>
                <dl>
                    <dt>Americano</dt>
                    <dd>Bold espresso diluted with hot water for a rich, smooth flavor</dd>
                    
                    <dt>Latte</dt>
                    <dd>Espresso with steamed milk and a light layer of microfoam</dd>
                    
                    <dt>Butterscotch Latte</dt>
                    <dd>Creamy latte infused with our signature butterscotch syrup</dd>
                    
                    <dt>Cappuccino</dt>
                    <dd>Equal parts espresso, steamed milk, and thick milk foam</dd>
                    
                    <dt>Chocolate</dt>
                    <dd>Rich, velvety hot chocolate made with premium cocoa</dd>
                    
                    <dt>Yuri Matcha</dt>
                    <dd>Special purple sweet potato matcha latte, steamed to perfection</dd>
                    
                    <dt>Houjicha</dt>
                    <dd>Roasted green tea with nutty, toasty flavors - caffeine conscious</dd>
                </dl>
            </section>

            <aside class="product-tips">
                <h3>Serving Suggestions</h3>
                <p>To fully enjoy our Hot Beverages:</p>
                <ul>
                    <li>Drink immediately for optimal temperature</li>
                    <li>Hold the cup with both hands to warm up</li>
                    <li>Pair espresso drinks with biscotti</li>
                    <li>Ask about our temperature adjustment options</li>
                </ul>
                <p>Try different drinks seasonally for new experiences!</p>
            </aside>
        </div>
    </main>
    <footer>
        <?php include("footer.php"); ?> 
    </footer>
</body>
</html>
