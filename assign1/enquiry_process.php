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
    $first_name = sanitize($_POST['first_name']);
    $last_name = sanitize($_POST['last_name']);
    $email = sanitize($_POST['email']);
    $street_address = sanitize($_POST['street_address']);
    $city = sanitize($_POST['city']);
    $state = sanitize($_POST['state']);
    $postcode = sanitize($_POST['postcode']);
    $phone = sanitize($_POST['phone']);
    $enquiry_type = sanitize($_POST['enquiry_type']);

    // Server-side validation
    if (!preg_match("/^[A-Za-z]{1,25}$/", $first_name)) {
        $error = "First name must be 1-25 letters only.";
    } elseif (!preg_match("/^[A-Za-z]{1,25}$/", $last_name)) {
        $error = "Last name must be 1-25 letters only.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (strlen($street_address) > 40) {
        $error = "Street address must not exceed 40 characters.";
    } elseif (strlen($city) > 20) {
        $error = "City must not exceed 20 characters.";
    } elseif (
        !in_array($state, [
            'Johor',
            'Kedah',
            'Kelantan',
            'Malacca',
            'Negeri Sembilan',
            'Pahang',
            'Penang',
            'Perak',
            'Perlis',
            'Sabah',
            'Sarawak',
            'Selangor',
            'Terengganu',
            'Kuala Lumpur',
            'Labuan',
            'Putrajaya'
        ])
    ) {
        $error = "Invalid state selected.";
    } elseif (!preg_match("/^\d{5}$/", $postcode)) {
        $error = "Postcode must be exactly 5 digits.";
    } elseif (!preg_match("/^\d{10}$/", $phone)) {
        $error = "Phone number must be exactly 10 digits.";
    } elseif (!in_array($enquiry_type, ['Membership', 'Products', 'Pop-up Market activities'])) {
        $error = "Invalid enquiry type selected.";
    }

    // If no errors, insert into database
    if (empty($error)) {
        try {
            $stmt = $conn->prepare("
                INSERT INTO enquiry (first_name, last_name, email, street_address, city, state, postcode, phone, enquiry_type)
                VALUES (:first_name, :last_name, :email, :street_address, :city, :state, :postcode, :phone, :enquiry_type)
            ");
            $stmt->execute([
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':email' => $email,
                ':street_address' => $street_address,
                ':city' => $city,
                ':state' => $state,
                ':postcode' => $postcode,
                ':phone' => $phone,
                ':enquiry_type' => $enquiry_type
            ]);
            $success = "Enquiry submitted successfully!";
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}

// Redirect back to enquiry.php with error or success message
if (!empty($error)) {
    header("Location: enquiry.php?error=" . urlencode($error));
} else {
    header("Location: enquiry.php?success=" . urlencode($success));
}
exit();
?>