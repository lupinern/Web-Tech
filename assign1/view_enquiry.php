<?php
// Start session for admin authentication
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Adjust as per your MySQL setup
$password = ""; // Adjust as per your MySQL setup
$dbname = "brewngo"; // Updated to match the database name



include("database.php");
$conn = mysqli_connect($db_server, $db_user, $db_password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";
$enquiries = [];

// Handle CRUD operations
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) {
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $street_address = mysqli_real_escape_string($conn, $_POST['street_address']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $enquiry_type = mysqli_real_escape_string($conn, $_POST['enquiry_type']);

        $stmt = mysqli_prepare($conn, "INSERT INTO enquiry (first_name, last_name, email, street_address, city, state, postcode, phone, enquiry_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssssssss", $first_name, $last_name, $email, $street_address, $city, $state, $postcode, $phone, $enquiry_type);
        if (mysqli_stmt_execute($stmt)) {
            $message = "Enquiry created successfully.";
        } else {
            $message = "Error creating enquiry: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } elseif (isset($_POST['edit'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $street_address = mysqli_real_escape_string($conn, $_POST['street_address']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $enquiry_type = mysqli_real_escape_string($conn, $_POST['enquiry_type']);

        $stmt = mysqli_prepare($conn, "UPDATE enquiry SET first_name = ?, last_name = ?, email = ?, street_address = ?, city = ?, state = ?, postcode = ?, phone = ?, enquiry_type = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "sssssssssi", $first_name, $last_name, $email, $street_address, $city, $state, $postcode, $phone, $enquiry_type, $id);
        if (mysqli_stmt_execute($stmt)) {
            $message = "Enquiry updated successfully.";
        } else {
            $message = "Error updating enquiry: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } elseif (isset($_POST['delete'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        if (mysqli_query($conn, "DELETE FROM enquiry WHERE id = $id")) {
            $message = "Enquiry deleted successfully.";
        } else {
            $message = "Error deleting enquiry: " . mysqli_error($conn);
        }
    }
}

// Fetch all enquiries
$result = mysqli_query($conn, "SELECT * FROM enquiry ORDER BY id DESC");
while ($row = mysqli_fetch_assoc($result)) {
    $enquiries[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Enquiries</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .message {
            color: green;
            font-size: 0.9em;
        }

        .error {
            color: red;
            font-size: 0.9em;
        }

        .form-section {
            margin-bottom: 20px;
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
        <section class="container">
            <h1>Manage Enquiries</h1>
            <?php if ($message)
                echo '<p class="' . (strpos($message, 'Error') === false ? 'message' : 'error') . '">' . htmlspecialchars($message) . '</p>'; ?>

            <!-- Create Form -->
            <div class="form-section">
                <h2>Create New Enquiry</h2>
                <form method="post" action="view_enquiry.php">
                    <input type="hidden" name="create" value="1">
                    <p><label for="first_name">First Name:</label><br><input type="text" name="first_name" required></p>
                    <p><label for="last_name">Last Name:</label><br><input type="text" name="last_name" required></p>
                    <p><label for="email">Email:</label><br><input type="email" name="email" required></p>
                    <p><label for="street_address">Street Address:</label><br><input type="text" name="street_address"
                            required></p>
                    <p><label for="city">City:</label><br><input type="text" name="city" required></p>
                    <p><label for="state">State:</label><br><input type="text" name="state" required></p>
                    <p><label for="postcode">Postcode:</label><br><input type="text" name="postcode" pattern="\d{5}"
                            required></p>
                    <p><label for="phone">Phone:</label><br><input type="text" name="phone" pattern="\d{10}" required>
                    </p>
                    <p><label for="enquiry_type">Enquiry Type:</label><br>
                        <select name="enquiry_type" required>
                            <option value="Membership">Membership</option>
                            <option value="Products">Products</option>
                            <option value="Pop-up Market activities">Pop-up Market activities</option>
                        </select>
                    </p>
                    <input type="submit" value="Create Enquiry">
                </form>
            </div>

            <!-- View and Edit/Delete Table -->
            <?php if (empty($enquiries)): ?>
                <p>No enquiries found.</p>
            <?php else: ?>
                <h2>Existing Enquiries</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Street Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Phone</th>
                            <th>Enquiry Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($enquiries as $enquiry): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($enquiry['id']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['first_name']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['last_name']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['email']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['street_address']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['city']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['state']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['postcode']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['phone']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['enquiry_type']); ?></td>
                                <td>
                                    <!-- Edit Form -->
                                    <form method="post" action="view_enquiry.php" style="display:inline;">
                                        <input type="hidden" name="edit" value="1">
                                        <input type="hidden" name="id" value="<?php echo $enquiry['id']; ?>">
                                        <input type="text" name="first_name"
                                            value="<?php echo htmlspecialchars($enquiry['first_name']); ?>" required
                                            style="width:60px;">
                                        <input type="text" name="last_name"
                                            value="<?php echo htmlspecialchars($enquiry['last_name']); ?>" required
                                            style="width:60px;">
                                        <input type="email" name="email"
                                            value="<?php echo htmlspecialchars($enquiry['email']); ?>" required
                                            style="width:100px;">
                                        <input type="text" name="street_address"
                                            value="<?php echo htmlspecialchars($enquiry['street_address']); ?>" required
                                            style="width:100px;">
                                        <input type="text" name="city" value="<?php echo htmlspecialchars($enquiry['city']); ?>"
                                            required style="width:60px;">
                                        <input type="text" name="state"
                                            value="<?php echo htmlspecialchars($enquiry['state']); ?>" required
                                            style="width:60px;">
                                        <input type="text" name="postcode"
                                            value="<?php echo htmlspecialchars($enquiry['postcode']); ?>" pattern="\d{5}"
                                            required style="width:50px;">
                                        <input type="text" name="phone"
                                            value="<?php echo htmlspecialchars($enquiry['phone']); ?>" pattern="\d{10}" required
                                            style="width:80px;">
                                        <select name="enquiry_type" required style="width:120px;">
                                            <option value="Membership" <?php echo $enquiry['enquiry_type'] == 'Membership' ? 'selected' : ''; ?>>Membership</option>
                                            <option value="Products" <?php echo $enquiry['enquiry_type'] == 'Products' ? 'selected' : ''; ?>>Products</option>
                                            <option value="Pop-up Market activities" <?php echo $enquiry['enquiry_type'] == 'Pop-up Market activities' ? 'selected' : ''; ?>>
                                                Pop-up Market activities</option>
                                        </select>
                                        <input type="submit" value="Save" style="padding:2px;">
                                    </form>
                                    <!-- Delete Form -->
                                    <form method="post" action="view_enquiry.php" style="display:inline;"
                                        onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                                        <input type="hidden" name="delete" value="1">
                                        <input type="hidden" name="id" value="<?php echo $enquiry['id']; ?>">
                                        <input type="submit" value="Delete" style="padding:2px;">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </section>
    </main>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>