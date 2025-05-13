<!DOCTYPE html>
<html>
    <?php include("navigation.php"); ?>
    <fieldset>
        <legend>Your Application has been Submitted</legend>
        <?php
            echo "First Name: ".$_POST["first_name"];
        ?>
    </fieldset>
    <?php include("footer.php"); ?> 
</html>