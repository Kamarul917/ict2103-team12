<?php
$servername = "db.infernodragon.cloud"; // Your database server name
$username = "webdbuser"; // Your database user name which you use to connect
$password = "wdbRW123!@#"; // Your database password
$database = "webdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>