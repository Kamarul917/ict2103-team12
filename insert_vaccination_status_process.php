<?php
    include 'db/connect.php';

    function sanitize_input($data){       
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($_POST['country'])){
        $country = sanitize_input($_POST["country"]);
    }

    if(isset($_POST['date'])){
        $date = sanitize_input($_POST["date"]);
        $myDateTime = DateTime::createFromFormat('Y-m-d', $date);
        $formatteddate = $myDateTime->format('d-m-Y');
    }

    if(isset($_POST['total_vaccination'])){
        $total_vaccination = sanitize_input($_POST["total_vaccination"]);
    }

    if(isset($_POST['fully_vaccinated'])){
        $fully_vaccinated = sanitize_input($_POST["fully_vaccinated"]);
    }

    if(!empty($date) && !empty($fully_vaccinated) && !empty($total_vaccination) && !empty($country)) { 
        $mysqli = "INSERT INTO vaccination_status (iso_code, date, total_vaccination, fully_vaccination) VALUES ('$country', '$date', '$total_vaccination', '$fully_vaccinated');";
        (mysqli_query($con1, $mysqli));
    }

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
            <header>            
            </header>
            <?php include "templates/intro1.inc.php"; ?>
            <div class="align-self-center">
                <?php if(!empty($date) && !empty($fully_vaccinated) && !empty($total_vaccination) && !empty($country)) {?>
                <div class="col-lg-12 col-md-12 my-4 align-self-center">
                    <div class="d-flex justify-content-center">
                        <h1>Vaccination data of <?php echo $country; ?> has been insert!</h1>          
                    </div>
                    <div class="d-flex justify-content-center">
                        <h2>The total number of vaccination as per on <?php echo $formatteddate ?> is <?php echo $total_vaccination ?></h2>  
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <h2>The total number of fully vaccinated personnel as per on <?php echo $formatteddate ?> is <?php echo $total_vaccination ?></h2>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <a href="index.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Home</a>
                        &nbsp;
                        <a href="insert_vaccination_status.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Back to add more data</a>
                    </div>
                </div>
                <?php }
                else{ ?>
                <div class="col-lg-12 col-md-12 my-4 align-self-center">
                    <div class="d-flex justify-content-center">
                        <h1>The data entered is not insert into the database</h1>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h2>Please fill up all of the fields and not leave blank</h2>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <a href="insert_vaccination_status.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Back to add more data</a>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <a href="index.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Home</a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php include "templates/footer.inc.php"; ?>
        </main>
    </body>