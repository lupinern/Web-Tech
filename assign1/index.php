<?php
// Database connection
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "brewngo";

// Connect to database
$conn = mysqli_connect($db_server, $db_user, $db_password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $db_name";
if (!mysqli_query($conn, $sql)) {
    die("Error creating database: " . mysqli_error($conn));
}

// Select the database
mysqli_select_db($conn, $db_name);

// Create admin table
$sql = "CREATE TABLE IF NOT EXISTS admin (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL,
    password VARCHAR(25) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $sql);

// Check if admin exists, if not create default admin
$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = 'admin'");
if (mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO admin (username, password) VALUES ('admin', 'admin')";
    mysqli_query($conn, $sql);
}

// Create user table (previously login)
$sql = "CREATE TABLE IF NOT EXISTS user (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL,
    password VARCHAR(25) NOT NULL,
    is_admin TINYINT(1) DEFAULT 0
)";
mysqli_query($conn, $sql);

// Create membership table (previously members)
$sql = "CREATE TABLE IF NOT EXISTS membership (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    email VARCHAR(50) NOT NULL,
    login_id VARCHAR(10) NOT NULL UNIQUE,
    password VARCHAR(25) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $sql);

// Create enquiry table
$sql = "CREATE TABLE IF NOT EXISTS enquiry (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL,
    street_address VARCHAR(40) NOT NULL,
    city VARCHAR(20) NOT NULL,
    state VARCHAR(20) NOT NULL,
    postcode CHAR(5) NOT NULL,
    phone CHAR(10) NOT NULL,
    enquiry_type ENUM('Membership', 'Products', 'Pop-up Market activities') NOT NULL
)";
mysqli_query($conn, $sql);

// Create job table
$sql = "CREATE TABLE IF NOT EXISTS job (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    street_address VARCHAR(100) NOT NULL,
    city VARCHAR(20) NOT NULL,
    states VARCHAR(20) NOT NULL,
    postcode VARCHAR(5) NOT NULL,
    phone_number INT(11) NOT NULL,
    cv VARCHAR(50) NOT NULL,
    photo VARCHAR(50) NOT NULL
)";
mysqli_query($conn, $sql);

mysqli_close($conn);
?>


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
