<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Application Submission</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <header>
            <nav>
                <?php include("navigation.php"); ?>
            </nav>
        </header>
            <?php
                // Connect to the database
                $conn = mysqli_connect("localhost", "root", "", "brewngo");

                $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
                $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                $street_address = mysqli_real_escape_string($conn, $_POST["street_address"]);
                $city = mysqli_real_escape_string($conn, $_POST["city"]);
                $state = mysqli_real_escape_string($conn, $_POST["state"]);
                $postcode = mysqli_real_escape_string($conn, $_POST["postcode"]);
                $phone = mysqli_real_escape_string($conn, $_POST["phone"]);

                // To store applicants' cv and photo
                $upload = "upload/";

                // CV
                $cv = $_FILES["CVfileUpload"]['name'];
                $cvUpload = $upload . basename($cv);

                // Photo
                $image = $_FILES["PhotofileUpload"]['name'];
                $imageUpload = $upload . basename($image);

                // Move the files to the upload folder
                move_uploaded_file($_FILES["CVfileUpload"]["tmp_name"], $cvUpload);
                move_uploaded_file($_FILES["PhotofileUpload"]["tmp_name"], $imageUpload);

                // Insert form data and file paths into the database
                $sql = "INSERT INTO job(first_name, last_name, email, street_address, city, states, postcode, phone_number, cv, photo)
                        VALUES('$first_name', '$last_name', '$email', '$street_address', '$city', '$state', '$postcode',
                         '$phone', '$cvUpload', '$imageUpload')";

                if(!mysqli_query($conn, $sql)){
                    echo "<p>Your application has failed to be sent to the database</p>";
                }
                else{
                    echo '<fieldset class="form-container">';
                        echo"<legend>Your Application has been Submitted to the Database</legend>";
                        echo "First Name: ". htmlspecialchars($_POST["first_name"]) . "<br>";
                        echo "Last Name: ". htmlspecialchars($_POST["last_name"]) . "<br>";
                        echo "Email: ". htmlspecialchars($_POST["email"]) . "<br>";
                        echo "Street Address: ". htmlspecialchars($_POST["street_address"]) . "<br>";
                        echo "City/Town: ". htmlspecialchars($_POST["city"]) . "<br>";
                        echo "State: ". htmlspecialchars($_POST["state"]) . "<br>";
                        echo "Postcode: ". htmlspecialchars($_POST["postcode"]) . "<br>";
                        echo "CV: <a href='" . htmlspecialchars($cvUpload) . "' target='_blank'>" . htmlspecialchars($cv) . "</a><br>";
                        echo "Photo: <br><img src='" . htmlspecialchars($imageUpload) . "' alt='Photo Uploaded' class='photo_size'>";
                    echo '</fieldset>';
                }
            ?>
        <footer>
            <?php include("footer.php"); ?> 
        </footer>
    </body>
</html>