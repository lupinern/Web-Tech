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
        <fieldset class="form-container">
            <legend>Your Application has been Submitted</legend>
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

                $cvData = addslashes(file_get_contents($_FILES["CVfileUpload"]["tmp_name"]));
                $photoData = addslashes(file_get_contents($_FILES["PhotofileUpload"]["tmp_name"]));

                // Insert data into the database
                $sql = "INSERT INTO JoinUs(first_name, last_name, email, street_address, city, states, postcode, phone_number, cv, photo)
                        VALUES('$first_name', '$last_name', '$email', '$street_address', '$city', '$state', '$postcode', '$phone', '$cvData', '$photoData')";

                if(!mysqli_query($conn, $sql)){
                    echo "<p>Your applicaiton failed to be sent to the database: " . mysqli_error($conn) . "</p>";
                }

                mysqli_close($conn);

                // Upload directory for image and cv
                $uploadImage = "upload/";

                // Image
                $image = $_FILES["PhotofileUpload"]['name'];
                $imageTMP = $_FILES["PhotofileUpload"]['tmp_name'];
                $imageUpload = "upload/" . basename($image);

                // CV
                $cv = $_FILES["CVfileUpload"]['name'];
                $cvTMP = $_FILES["CVfileUpload"]['tmp_name'];
                $cvUpload = "upload/" . basename($cv);

                echo "First Name: ".$_POST["first_name"] . "<br>";
                echo "Last Name: ".$_POST["last_name"] . "<br>";
                echo "Email: ".$_POST["email"] . "<br>";
                echo "Street Address: ".$_POST["street_address"] . "<br>";
                echo "City/Town: ".$_POST["city"] . "<br>";
                echo "State: ".$_POST["state"] . "<br>";
                echo "Postcode ".$_POST["postcode"] . "<br>";

                // Show CV
                if(move_uploaded_file($cvTMP, $cvUpload)){
                    echo "CV: <a href='" . htmlspecialchars($cvUpload) . "' target='_blank'>" . htmlspecialchars($cv) . "</a><br>";
                }
                else{
                    echo "Your CV has failed to upload";
                }
                
                // Show Image
                if(move_uploaded_file($imageTMP, $imageUpload)){
                    echo "Photo: " . htmlspecialchars($image) . "<br>";
                    echo "<img src='" . htmlspecialchars($imageUpload) . "' alt='Photo' style='width: 300px; height: auto;'><br>";
                } 
                else{
                    echo "Your photo has failed to upload.<br>";
                }

            ?>
        </fieldset>
        <footer>
            <?php include("footer.php"); ?> 
        </footer>
    </body>
</html>