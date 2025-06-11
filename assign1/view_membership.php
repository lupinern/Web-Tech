<?php
// Start session for admin authentication
session_start();

// Check if user is logged in and is an admin
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: login.php");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brewngo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize message variables
$message = '';
$messageType = '';

// Handle DELETE operation
if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['member_id'])) {
    $member_id = (int) $_POST['member_id'];

    try {
        $stmt = mysqli_prepare($conn, "DELETE FROM membership WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $member_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $message = "Member deleted successfully";
        $messageType = "success";
    } catch (Exception $e) {
        $message = "Error deleting member: " . $e->getMessage();
        $messageType = "error";
    }
}

// Handle EDIT operation
if (isset($_POST['action']) && $_POST['action'] == 'edit' && isset($_POST['member_id'])) {
    $member_id = (int) $_POST['member_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $login_id = $_POST['login_id'];

    try {
        $stmt = mysqli_prepare($conn, "UPDATE membership SET first_name = ?, last_name = ?, email = ?, login_id = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "ssssi", $first_name, $last_name, $email, $login_id, $member_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $message = "Member updated successfully";
        $messageType = "success";
    } catch (Exception $e) {
        $message = "Error updating member: " . $e->getMessage();
        $messageType = "error";
    }
}

// Fetch all memberships from the members table
$result = mysqli_query($conn, "SELECT * FROM membership ORDER BY id DESC");
$members = [];
while ($row = mysqli_fetch_assoc($result)) {
    $members[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Memberships | Brew N Go</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .dashboard-link {
            margin-bottom: 20px;
            display: block;
        }

        .no-records {
            margin-top: 20px;
            font-style: italic;
            color: #777;
        }

        /* Action buttons */
        .action-btn {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 3px;
            text-decoration: none;
            color: white;
            font-size: 14px;
            cursor: pointer;
            border: none;
        }

        .edit-btn {
            background-color: #4CAF50;
        }

        .delete-btn {
            background-color: #f44336;
        }

        /* Message styling */
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }

        .success {
            background-color: #dff0d8;
            border-left: 5px solid #3c763d;
            color: #3c763d;
        }

        .error {
            background-color: #f2dede;
            border-left: 5px solid #a94442;
            color: #a94442;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border-radius: 5px;
            width: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-actions {
            margin-top: 20px;
        }

        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
        <section class="content">
            <h1>Registered Members</h1>

            <a href="admin_dashboard.php" class="dashboard-link">← Back to Dashboard</a>

            <?php if (!empty($message)): ?>
                <div class="message <?php echo $messageType; ?>"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <?php if (count($members) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Login ID</th>
                            <th>Registration Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($members as $member): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($member['id']); ?></td>
                                <td><?php echo htmlspecialchars($member['first_name']); ?></td>
                                <td><?php echo htmlspecialchars($member['last_name']); ?></td>
                                <td><?php echo htmlspecialchars($member['email']); ?></td>
                                <td><?php echo htmlspecialchars($member['login_id']); ?></td>
                                <td><?php echo htmlspecialchars($member['reg_date']); ?></td>
                                <td>
                                    <button class="action-btn edit-btn" onclick="openEditModal(<?php
                                    echo htmlspecialchars($member['id']); ?>, 
                                        '<?php echo htmlspecialchars(addslashes($member['first_name'])); ?>', 
                                        '<?php echo htmlspecialchars(addslashes($member['last_name'])); ?>', 
                                        '<?php echo htmlspecialchars(addslashes($member['email'])); ?>', 
                                        '<?php echo htmlspecialchars(addslashes($member['login_id'])); ?>')">
                                        Edit
                                    </button>
                                    <form method="post" style="display: inline;">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="member_id" value="<?php echo $member['id']; ?>">
                                        <button type="submit" class="action-btn delete-btn"
                                            onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="no-records">No registered members found.</p>
            <?php endif; ?>

            <!-- Edit Modal -->
            <div id="editModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Edit Member</h2>
                        <span class="close" onclick="closeEditModal()">&times;</span>
                    </div>
                    <form method="post">
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="member_id" id="edit_member_id">

                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" id="edit_first_name" name="first_name" required>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" id="edit_last_name" name="last_name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="edit_email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="login_id">Login ID:</label>
                            <input type="text" id="edit_login_id" name="login_id" required>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="submit-btn">Update Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <?php include("footer.php"); ?>
    </footer>

    <script>
        // Get the modal
        var modal = document.getElementById("editModal");

        // Function to open the edit modal and populate with member data
        function openEditModal(id, firstName, lastName, email, loginId) {
            document.getElementById("edit_member_id").value = id;
            document.getElementById("edit_first_name").value = firstName;
            document.getElementById("edit_last_name").value = lastName;
            document.getElementById("edit_email").value = email;
            document.getElementById("edit_login_id").value = loginId;
            modal.style.display = "block";
        }

        // Function to close the edit modal
        function closeEditModal() {
            modal.style.display = "none";
        }

        // Close modal if clicked outside of it
        window.onclick = function (event) {
            if (event.target == modal) {
                closeEditModal();
            }
        }
    </script>
</body>

</html>
