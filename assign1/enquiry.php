<?php
// Database connection for table creation
$servername = "localhost";
$username = "root"; // Adjust as per your MySQL setup
$password = ""; // Adjust as per your MySQL setup
$dbname = "brewngo"; // Database name as per your setup

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Check if the enquiry table exists
	$tableCheck = $conn->query("SHOW TABLES LIKE 'enquiry'");
	if ($tableCheck->rowCount() == 0) {
		// Table doesn't exist, create it
		$sql = "CREATE TABLE enquiry (
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

		$conn->exec($sql);
		// Optional: Display a message for debugging (remove in production)
		$table_message = "Enquiry table created successfully.";
	} else {
		$table_message = "Enquiry table already exists.";
	}
} catch (PDOException $e) {
	$table_message = "Error creating table: " . $e->getMessage();
}

$conn = null; // Close the connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Enquiry Form</title>
	<link rel="stylesheet" href="styles/style.css">
	<style>
		.error {
			color: red;
			font-size: 0.9em;
		}

		.success {
			color: green;
			font-size: 0.9em;
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
			<div class="form-container">
				<h1>Enquiry Form</h1>
				<h3>Complete this form to place your order</h3>
				<?php
				// Display error or success messages if any
				if (isset($_GET['error'])) {
					echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
				}
				if (isset($_GET['success'])) {
					echo '<p class="success">' . htmlspecialchars($_GET['success']) . '</p>';
				}
				?>
				<form action="enquiry_process.php" method="post" id="enquiry-form">
					<!-- First Name -->
					<p>
						<label for="enquiry-first_name">First Name</label><br>
						<input type="text" id="enquiry-first_name" name="first_name" maxlength="25"
							placeholder="Ex: John" pattern="[A-Za-z]{1,25}" required aria-required="true" />
					</p>

					<!-- Last Name -->
					<p>
						<label for="enquiry-last_name">Last Name</label><br>
						<input type="text" id="enquiry-last_name" name="last_name" maxlength="25"
							placeholder="Ex: Smith" pattern="[A-Za-z]{1,25}" required aria-required="true" />
					</p>

					<!-- Email Address -->
					<p>
						<label for="enquiry-email">Email Address</label><br>
						<input type="email" id="enquiry-email" name="email" placeholder="Ex: john123@mail.com" required
							aria-required="true" />
					</p>

					<!-- Address Fieldset -->
					<fieldset id="enquiry-address">
						<legend>Address</legend>
						<!-- Street Address -->
						<p>
							<label for="enquiry-street_address">Street Address</label><br>
							<input type="text" id="enquiry-street_address" name="street_address" maxlength="40"
								placeholder="Ex: John Smith st., no. 5A, 12345" required aria-required="true" />
						</p>

						<!-- City/Town -->
						<p>
							<label for="enquiry-city">City/Town</label><br>
							<input type="text" id="enquiry-city" name="city" maxlength="20" placeholder="Ex: Kuching"
								required aria-required="true" />
						</p>

						<!-- State -->
						<p>
							<label for="enquiry-state">State</label><br>
							<select id="enquiry-state" name="state" required aria-required="true">
								<option value="">Please Select</option>
								<option value="Johor">Johor</option>
								<option value="Kedah">Kedah</option>
								<option value="Kelantan">Kelantan</option>
								<option value="Malacca">Malacca</option>
								<option value="Negeri Sembilan">Negeri Sembilan</option>
								<option value="Pahang">Pahang</option>
								<option value="Penang">Penang</option>
								<option value="Perak">Perak</option>
								<option value="Perlis">Perlis</option>
								<option value="Sabah">Sabah</option>
								<option value="Sarawak">Sarawak</option>
								<option value="Selangor">Selangor</option>
								<option value="Terengganu">Terengganu</option>
								<option value="Kuala Lumpur">Kuala Lumpur</option>
								<option value="Labuan">Labuan</option>
								<option value="Putrajaya">Putrajaya</option>
							</select>
						</p>

						<!-- Postcode -->
						<p>
							<label for="enquiry-postcode">Postcode</label><br>
							<input type="text" id="enquiry-postcode" name="postcode" maxlength="5"
								placeholder="Ex: 12345" pattern="\d{5}" required aria-required="true" />
						</p>
					</fieldset>

					<!-- Phone Number -->
					<p>
						<label for="enquiry-phone">Phone Number</label><br>
						<input type="text" id="enquiry-phone" name="phone" placeholder="Ex: 0123456789" pattern="\d{10}"
							required aria-required="true" />
					</p>

					<!-- Enquiry Type -->
					<p>
						<label for="enquiry-type">Enquiry Type</label><br>
						<select id="enquiry-type" name="enquiry_type" required aria-required="true">
							<option value="">Please Select</option>
							<option value="Membership">Membership</option>
							<option value="Products">Products</option>
							<option value="Pop-up Market activities">Pop-up Market activities</option>
						</select>
					</p>

					<!-- Submit and Reset Button -->
					<input type="submit" name="submit" id="enquiry-submit" value="Submit Enquiry" />
					<input type="reset" name="reset" id="enquiry-reset" value="Reset Form" />
				</form>
			</div>
		</section>
	</main>
	<footer>
		<?php include("footer.php"); ?>
	</footer>
</body>

</html>