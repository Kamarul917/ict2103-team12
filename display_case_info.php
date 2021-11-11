<?php
    include 'config.php';

    // if(isset($_POST['country_name']))
    // {
    //     $country_name = $_POST['country_name'];
    // }

    $stmt = $conn->prepare("SELECT country_name, serious_cases, death_cases, active_cases, population FROM covid_data, country 
    WHERE covid_data.iso_code = country.iso_code and country_name = 'Singapore' ");
    //$stmt->bind_param("s", $country_name);
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
        <?php include "templates/head2.inc.php"; ?>
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
                        <a href="index.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include "templates/footer.inc.php"; ?>
        </main>

    </body>