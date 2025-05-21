<!DOCTYPE html>
<html>
    <head>
        <title>Application Submission</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <?php include("navigation.php"); ?>
        <fieldset>
            <legend>Your Application has been Submitted</legend>
            <?php
                echo "First Name: ".$_POST["first_name"] . "<br>";
                echo "Last Name: ".$_POST["last_name"] . "<br>";
                echo "Email: ".$_POST["email"] . "<br>";
                echo "Street Address: ".$_POST["street_address"] . "<br>";
                echo "City/Town: ".$_POST["city"] . "<br>";
                echo "State: ".$_POST["state"] . "<br>";
                echo "Postcode ".$_POST["postcode"] . "<br>";
                echo "Phone number: ".$_POST["phone"] . "<br>";
                echo "CV: ".$_FILES["CVfileUpload"]['name'] . "<br>";
                echo "Photo: ".$_FILES["PhotofileUpload"]['name'] . "<br>";
            ?>
        </fieldset>
        <?php include("footer.php"); ?> 
    </body>
</html>