<?php
    include 'config.php';

    // if(isset($_POST['iso_code']))
    // {
    //     $iso_code = $_POST['iso_code'];
    // }

    $stmt = $conn->prepare("SELECT country_name, serious_cases, death_cases, active_cases, population FROM covid_data, country 
    WHERE covid_data.iso_code = country.iso_code and covid_data.iso_code = 'SGP' ");
    //$stmt->bind_param("s", $iso_code);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $serious_cases = $row["serious_cases"];
    $country_name = $row["country_name"];
    $death_cases = $row["death_cases"];
    $active_cases = $row["active_cases"];
    $population = $row["population"];

    function sigFig($value, $digits){
    if ($value == 0){
        $decimalPlaces = $digits - 1;
    } elseif ($value < 0){
        $decimalPlaces = $digits - floor(log10($value * -1)) - 1;
    } else{
        $decimalPlaces = $digits - floor(log10($value)) - 1;
    }

    $answer = round($value, $decimalPlaces);
    return $answer;
    }

    $percentOfPopulationInfected = sigFig((($active_cases + $serious_cases) / $population * 100), 3);
    $ratioOfSeriousToActive = sigFig((($serious_cases/$active_cases) * 100), 3);


    //global $errorMsg, $dbhost, $dbaccount, $dbpw, $db;

    //set the db connection info here
    //include "connection_settings.php";

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
        <div class="container-fluid">
            <div class="align-self-center">
                <div class="col-lg-12 col-md-12 my-4 align-self-center">
                    <div class="d-flex justify-content-center">
                        <h2><?php echo $country_name; ?> Case Information</h2>
                    </div>
                    <br>
                    <table class = "table table-dark table-hover">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Total Number of Cases: </th>
                                <td> <?php echo $active_cases; ?> </td>
                            </tr>
                            <tr>
                                <th scope="row">Serious Cases: </th>
                                <td> <?php echo $serious_cases; ?> </td>
                            </tr>
                            <tr>
                                <th scope="row">Death Cases: </th>
                                <td> <?php echo $death_cases; ?> </td>
                            </tr>
                            <tr>
                                <th scope="row">Percentage of population infected: </th>
                                <td> <?php echo $percentOfPopulationInfected; ?> </td>
                            </tr>
                            <tr>
                                <th scope="row">Ratio of serious case to active case: </th>
                                <td> <?php echo $ratioOfSeriousToActive; ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <a href="index.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Home</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include "templates/footer.inc.php"; ?>
        </main>

    </body>