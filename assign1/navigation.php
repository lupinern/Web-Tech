<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is admin
$isAdmin = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true &&
    isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
?>

<div class="logo-container">
    <img src="images/logo.jpg" alt="Brew and Go Logo" class="nav-logo">
</div>
<ul>
    <!-- Home link always visible -->
    <li><a href="index.php">Home</a></li>

    <?php if ($isAdmin): ?>
        <!-- Show only admin dashboard when logged in as admin -->
        <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
    <?php else: ?>
        <!-- Regular navigation for non-admin users -->
        <li>
            <a href="#">Products</a>
            <ul class="dropdown">
                <li><a href="product1.php">Basic Brew</a></li>
                <li><a href="product2.php">Artisan Brew</a></li>
                <li><a href="product3.php">Non-Coffee</a></li>
                <li><a href="product4.php">Hot Beverages</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Activities</a>
            <ul class="dropdown">
                <li><a href="Coming_Soon.php">Coming soon</a></li>
                <li><a href="Current.php">Current</a></li>
                <li><a href="Past_Activities.php">Past Activities</a></li>
            </ul>
        </li>
        <li><a href="joinus.php">Join Us</a></li>
        <li><a href="enquiry.php">Enquiry</a></li>

        <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true): ?>
            <li><a href="registration.php">Membership Registration</a></li>
        <?php endif; ?>

        <li>
            <a href="#">Profile Pages</a>
            <ul class="dropdown">
                <li><a href="profile1.php">Luthfi Bahri</a></li>
                <li><a href="profile2.php">Aloysius Fung</a></li>
                <li><a href="profile3.php">Jason Hernando Kwee</a></li>
                <li><a href="profile4.php">Timothy Samuel Lain Chi Hung</a></li>
            </ul>
        </li>
    <?php endif; ?>
</ul>

<div class="login-btn-container">
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
        <a href="logout.php" class="login-btn">Logout</a>
    <?php else: ?>
        <a href="login.php" class="login-btn">Login</a>
    <?php endif; ?>
</div>
