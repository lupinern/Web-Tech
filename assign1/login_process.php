<?php 
    // Database connection
    $servername = "localhost";
    $username = "root"; // Adjust as per your MySQL setup
    $password = ""; // Adjust as per your MySQL setup
    $dbname = "brewngo"; // Updated to match the database name

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Function to sanitize input
    function sanitize($data)
    {
        return htmlspecialchars(trim($data));
    }

    // Initialize error message
    $error = "";

    // Validate form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login_username = sanitize($_POST['username']);
        $login_password = sanitize($_POST['password']);

        // Server-side validation
        if (!preg_match("/^[A-Za-z]{1,10}$/", $login_username)) {
            $error = "Username must be 1-10 characters only.";
        } elseif (!preg_match("/^[A-Za-z]{1,25}$/", $login_password)) {
            $error = "Password must be 1-25 characters only.";
        }

        // If no errors, insert into database
        if (empty($error)) {
            try {
                $stmt = $conn->prepare("
                    INSERT INTO login (username, password)
                    VALUES (:username, :password)
                ");
                 $stmt->execute([
                    ':username' => $login_username,
                    ':password' => $login_password,
                ]);
                $success = "Login successfully!";
            } catch (PDOException $e) {
                $error = "Database error: " . $e->getMessage();
            }
        }
    }

    // Redirect back to enquiry.php with error or success message
    if (!empty($error)) {
        header("Location: login.php?error=" . urlencode($error));
    } else {
        header("Location: login.php?success=" . urlencode($success));
    }
    exit();
?>