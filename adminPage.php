<?php
session_start();
// Define and initialize global variables:
$adminuserID = $adminpwd = $errorMsg = "";
$success = true;
$trueSuccess = true;

// Only process if the form has been submitted via POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Email Address
    if (empty($_POST["adminuserID"])) {
        $errorMsg .= "Username is required.<br>";
        $success = false;
        $trueSuccess = false;
    } else {
        $adminuserID = $_POST["adminuserID"];
    }

    // Password
    if (empty($_POST["adminpwd"])) {
        $errorMsg .= "Password is required.<br>";
        $success = false;
        $trueSuccess = false;
    } else {
        $adminpwd = ($_POST["adminpwd"]);
    }

    // If input is valid, query the DB to see if the email/pwd match
    if ($success) {
        if (($adminuserID == "admin") && ($adminpwd == "123")){
            $trueSuccess = true;
        } else {
            $errorMsg .= "Username or password entered is incorrect.";
            $trueSuccess = false;
        }
    }
} else {
    echo "<h2>This page is not meant to be run directly.</h2>";
    echo "<p>You can log in at the link below:</p>";
    echo "<a href='login.php'>Go to Login page...</a>";
    exit();
}
/*
 * Helper function that checks input for malicious or unwanted content.
 */


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employee Login | BLITZ Festival 2021</title>
        <?php
        include "templates/head2.inc.php";
        ?>
        <?php
        include "templates/head.inc.php";
        ?>
    </head>
    <body>
        <?php
        //include "templates/nav.inc.php";
        ?>
        <main class="container">
            <hr>
            <?php
            if ($trueSuccess) {

                echo "<h2>Login successful!</h2>";
                echo "<h4>Welcome back, " . $adminuserID . ".</h4>";
                echo "<a href='edit_population.php' class='btn btn-success'>Edit Population</a>";
            } else {

                echo "<h2>Oops!</h2>";
                echo "<h4>The following errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<a href='admin_login.php' class='btn btn-warning'>Return to Login</a>";
            }
            ?>
            <hr>
        </main>
        <?php
        include "templates/footer.inc.php";
        ?>
        <style>
            body{
                color:#f4f4f4;
                background-color: #222222;
            }
        </style>
    </body>
</html>