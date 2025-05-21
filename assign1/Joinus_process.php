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
                echo "First Name: ".$_POST["first_name"];
                echo "Last Name: ".$_POST["last_name"];
                echo "Email: ".$_POST["email"];
                echo "Street Address: ".$_POST["street_address"];
                echo "City/Town: ".$_POST["city"];
                echo "State: ".$_POST["state"];
                echo "Postcode ".$_POST["postcode"];
                echo "Phone number: ".$_POST["phone"];
                echo "CV: ".$_FILES["CVfileupload"];
                echo "Photo: ".$_FILES["Photofileupload"];
            ?>
        </fieldset>
        <?php include("footer.php"); ?> 
    </body>
</html>