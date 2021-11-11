<?php
//// Define and initialize global variables:
//$userid_or_email = $email = $userid = $fname = $lname = $pwd_hashed = $errorMsg = "";
//$success = true;
//
//// Only process if the form has been submitted via POST.
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    // Email Address
//    if (empty($_POST["userid_or_email"])) {
//        $errorMsg .= "Username or Email is required.<br>";
//        $success = false;
//    } else {
//        $userid_or_email = sanitize_input($_POST["userid_or_email"]);
//    }
//
//    // Password
//    if (empty($_POST["pwd"])) {
//        $errorMsg .= "Password is required.<br>";
//        $success = false;
//    } else {
//        $passwordd = $_POST["pwd"];
//    }
//
//    // If input is valid, query the DB to see if the email/pwd match
//    if ($success) {
//        authenticateUser();
//    }
//} else {
//    echo "<h2>This page is not meant to be run directly.</h2>";
//    echo "<p>You can log in at the link below:</p>";
//    echo "<a href='login.php'>Go to Login page...</a>";
//    exit();
//}
///*
// * Helper function that checks input for malicious or unwanted content.
// */
//
//function sanitize_input($data) {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
//}
//
///*
// * Helper function to authenticate the login.
// */
//
//function authenticateUser() {
//    global $userid_or_email, $userid, $dbemail, $fname, $lname, $email, $pwd_hashed, $passwordd, $errorMsg, $success;
//    // Create database connection.
//    $config = parse_ini_file('../../private/db-config.ini');
//    $conn = new mysqli($config['servername'], $config['username'],
//            $config['password'], $config['dbname']);
//
//    // Check connection
//    if ($conn->connect_error) {
//        $errorMsg = "Connection failed: " . $conn->connect_error;
//        $success = false;
//    } else {
//        // Prepare the statement:
//        $stmt = $conn->prepare("SELECT * FROM Accounts WHERE aEmail=? OR aUserID=?");
//        // Bind & execute the query statement:
//        $stmt->bind_param("ss", $userid_or_email, $userid_or_email);
//        $stmt->execute();
//        $result = $stmt->get_result();
//        if ($result->num_rows > 0) {
//            // Note that email field is unique, so should only have
//            // one row in the result set.
//            $row = $result->fetch_assoc();
//            $fname = $row["aFirstName"];
//            $lname = $row["aLastName"];
//            $userid = $row["aUserID"];
//            $dbemail = $row["aEmail"];
//            $pwd_hashed = $row["aPassword"];
//
//
//
//            // Check if the password matches:
//            if (!password_verify($passwordd, $pwd_hashed)) {
//                // Don't be too specific with the error message - hackers don't
//                // need to know which one they got right or wrong. :)
//                $errorMsg = "Email not found or password doesn't match...";
//                $success = false;
//            } else {
//                session_start();
//                $_SESSION['fname'] = $fname;
//                $_SESSION['lname'] = $lname;
//                $_SESSION['auserid'] = $userid;
//                $_SESSION['aemail'] = $dbemail;
//                header("location: index.php");
//            }
//        } else {
//            $errorMsg = "Username or Email not found or password doesn't match...";
//            $success = false;
//        }
//        $stmt->close();
//    }
//    $conn->close();
//}
?>
<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Results</title>-->
        <?php
//        include "templates/head.inc.php";
        ?>
<!--    </head>
    <body>-->
        <?php
//        include "templates/nav.inc.php";
        ?>
<!--        <main class="container">
            <hr>-->
            <?php
//            if ($success) {
//
//                echo "<h2>Login successful!</h2>";
//                echo "<h4>Welcome back, " . $fname . " " . $lname . ".</h4>";
//                echo "<a href='index.php' class='btn btn-success'>Return to Home</a>";
//            } else {
//
//                echo "<h2>Oops!</h2>";
//                echo "<h4>The following errors were detected:</h4>";
//                echo "<p>" . $errorMsg . "</p>";
//                echo "<a href='login.php' class='btn btn-warning'>Return to Login</a>";
//            }
            ?>
<!--            <hr>
        </main>-->
        <?php
//        include "footer.inc.php";
        ?>
<!--        <style>
            body{
                color:#f4f4f4;
                background-color: #222222;
            }
        </style>
    </body>
</html>-->