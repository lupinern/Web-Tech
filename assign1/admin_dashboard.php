<?php
session_start();

// Check if user is logged in and is an admin
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Brew N Go</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        .dashboard-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .admin-menu {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .menu-item {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .menu-item h2 {
            margin-top: 0;
            color: #333;
        }

        .menu-item p {
            color: #666;
            margin-bottom: 15px;
        }

        .menu-item a {
            display: inline-block;
            background-color: #332a21;
            /* Changed to match site's brown color */
            color: white;
            padding: 10px 20px;
            /* Match other buttons padding */
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .menu-item a:hover {
            background-color: #3b4c34;
            /* Match hover color from other buttons */
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <?php include("navigation.php"); ?>
        </nav>
    </header>
    <main>
        <div class="dashboard-container">
            <h1>Admin Dashboard</h1>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>

            <div class="admin-menu">
                <div class="menu-item">
                    <h2>Customer Enquiries</h2>
                    <p>View all customer enquiries submitted through the contact form.</p>
                    <a href="view_enquiry.php">View Enquiries</a>
                </div>

                <div class="menu-item">
                    <h2>Job Applications</h2>
                    <p>View all job applications submitted by potential employees.</p>
                    <a href="view_job.php">View Applications</a>
                </div>

                <div class="menu-item">
                    <h2>User Logins</h2>
                    <p>View all user login information and account details.</p>
                    <a href="view_login.php">View Logins</a>
                </div>

                <div class="menu-item">
                    <h2>Registered Members</h2>
                    <p>View all registered members and their details.</p>
                    <a href="view_membership.php">View Members</a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>