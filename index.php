<?php phpinfo(); ?>
<?php
$servername = "db.infernodragon.cloud"; // Your database server name
$username = "webdbuser"; // Your database user name which you use to connect
$password = "wdbRW123!@#"; // Your database password
$database = "webdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    //die("Connection failed: " . mysqli_connect_error());
    echo "Failed connection";
}
echo "Connected successfully";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>iCovidTravel</title>
        <link rel="icon" href="assets/favicon2.png" type="image/png" sizes="16x16">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity= "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!--Icons-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!--Font Styles-->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!----------------- Stylesheets ----------------->
        <!--Flipdown.js-->
        <link rel="stylesheet" type="text/css" href="plugins/flipdown/flipdown.css">  

        <!--Custom CSS-->
        <link rel="stylesheet" href="css/index.css">

        <!----------------- Scripts ----------------->
        <!--jQuery-->
        <script defer src="https://code.jquery.com/jquery-3.4.1.min.js"    
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="    
                crossorigin="anonymous">
        </script> 

        <!--Flipdown.js-->
        <script defer src="plugins/flipdown/flipdown.js"></script>   

        <!--Bootstrap JS--> 
        <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"    
                integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"    
                crossorigin="anonymous">
        </script> 

        <!--Custom JS -->
        <script defer src="js/index.js"></script>
        <?php include "templates/head.inc.php"; ?>
        
    </head>
    <?php include "templates/nav.inc.php"; ?>
    <body>
        
        <main>
                
            <!-- Hero Carousel -->
            <header>
                
            </header>
            <?php include "templates/intro1.inc.php"; ?>
            <!-- Spotify section -->
            <div class="container-fluid">
                <div class="align-self-center">
                    <div class="col-lg-12 col-md-12 my-4 align-self-center">
                        <div style="text-align: center;">
                        <label for="country">Select a Country:</label>
                        </div>
                        <div style="text-align: center; margin-top: 30px;">
                        <select name="country" id="country">
                            <option value="Singapore">Singapore</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Philippines">Philippines</option>
                        </select>
                        </div>
                        <div style="text-align: center; margin-top: 80px;">
                            <button type="button">Let's Go!</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "templates/footer.inc.php"; ?>
        </main>
    </body>
</html>

