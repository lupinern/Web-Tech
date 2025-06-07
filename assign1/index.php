<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew and Go Homepage</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include("database.php"); ?> 
    <header>
        <nav>
            <?php include("navigation.php"); ?> 
        </nav>
    </header>
    <main>
        <section class="content">
            <div class="hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('styles/images/homepage.jpg');">
                <div class="hero-content">
                    <h1>Quality Coffee</h1>
                    <h2>delivered to your Door</h2>
                </div>
            </div>
    
            <!-- About Section -->
            <div class="about-section">
                <h2>Have a Coffee</h2>
                <p>Learn more about our coffee.</p>
            </div>
    
            <!-- Feature Cards -->
            <div class="feature-cards">
                <div class="feature-card">
                    <div class="card-image" style="background-image: url('images/Aerocano.jpeg');"></div>
                    <div class="card-content">
                        <h3>Basic Brew</h3>
                        <p>Staples of Coffee.</p>
                        <a href="product1.php" class="card-btn">Learn More</a>
                    </div>
                </div>
                <div class="feature-card">
                    <div class="card-image" style="background-image: url('images/Butterscotch\ latte_1.jpeg');"></div>
                    <div class="card-content">
                        <h3>Artisan Brew</h3>
                        <p>Fancy something special?</p>
                        <a href="product2.php" class="card-btn">Learn More</a>
                    </div>
                </div>
                <div class="feature-card">
                    <div class="card-image" style="background-image: url('images/Matcha\ Latte.jpeg');"></div>
                    <div class="card-content">
                        <h3>Non-Coffee</h3>
                        <p>Try out alternatives.</p>
                        <a href="product3.php" class="card-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
</html>