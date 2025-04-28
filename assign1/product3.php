<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Non Coffee - Brew and Go</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <nav>
            <?php include("navigation.php"); ?> 
        </nav>
    </header>
    <main>
        <div class="product-hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/Matcha\ Latte.jpeg');">
            <div class="hero-content">
                <h1>Non-Coffee</h1>
                <h2>Refreshing Alternatives</h2>
            </div>
        </div>

        <div class="product-container">
            <section class="product-description">
                <h2>Our Delightful Alternatives</h2>
                <p>Explore our Non-Coffee collection - carefully crafted beverages for those who prefer their drinks without coffee but with all the complexity and care.</p>
                
                <figure>
                    <img src="images/Matcha Latte.jpeg" alt="Non-Coffee Beverage">
                    <figcaption>Our signature "Yuri Matcha Latte" - vibrant and energizing</figcaption>
                </figure>
                
                <h3>Why Try Non-Coffee?</h3>
                <ol>
                    <li>Perfect for those sensitive to caffeine</li>
                    <li>Equally crafted with premium ingredients</li>
                    <li>Unique flavor profiles you'll love</li>
                    <li>Great pairing with our pastry selection</li>
                </ol>
            </section>

            <section class="product-details">
                <h2>Menu Details</h2>
                <dl>
                    <dt>Chocolate</dt>
                    <dd>Rich, velvety hot chocolate made with premium cocoa</dd>
                    
                    <dt>Mint Chocolate</dt>
                    <dd>Cool peppermint blended with our signature hot chocolate</dd>
                    
                    <dt>Orange Chocolate</dt>
                    <dd>Zesty orange essence paired with dark chocolate</dd>
                    
                    <dt>Yuzu Soda</dt>
                    <dd>Sparkling Japanese citrus drink - refreshing and tangy</dd>
                    
                    <dt>Strawberry Soda</dt>
                    <dd>Sweet strawberry flavor with sparkling water</dd>
                    
                    <dt>Yuzu Cheese</dt>
                    <dd>Unique combination of yuzu citrus with creamy cheese foam</dd>
                    
                    <dt>Yuri Matcha</dt>
                    <dd>Special purple sweet potato matcha latte</dd>
                    
                    <dt>Strawberry Matcha</dt>
                    <dd>Layered strawberry and matcha latte</dd>
                    
                    <dt>Yuzu Matcha</dt>
                    <dd>Japanese yuzu citrus infused with ceremonial matcha</dd>
                    
                    <dt>Houjicha</dt>
                    <dd>Roasted green tea with nutty, toasty flavors</dd>
                </dl>
            </section>

            <aside class="product-tips">
                <h3>Enjoyment Tips</h3>
                <p>To get the most from our Non-Coffee selections:</p>
                <ul>
                    <li>Try the layered drinks without stirring first</li>
                    <li>Ask about our seasonal specials</li>
                    <li>Pair chocolate drinks with our croissants</li>
                    <li>Enjoy matcha drinks at 160°F for optimal flavor</li>
                </ul>
                <p>Ask our baristas for custom sweetness levels!</p>
            </aside>
        </div>
    </main>
    <footer>
        <?php include("footer.php"); ?> 
    </footer>
</body>
</html>
