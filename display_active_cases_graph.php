<?php
    include 'config.php';

    if (isset($_GET['next'])){
        $iso_code = $_GET['next'];
    }

    $stmt = $conn->prepare("SELECT country_name FROM country WHERE 
    iso_code = ?;");
    $stmt->bind_param("s", $iso_code);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $country_name = $row["country_name"];
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
        
        <!--Chart JS--> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
                        <h2><?php echo $country_name; ?> Active Cases (Monthly)</h2>
                    </div>
                    <br>
                    <table class = "table table-dark table-hover" style="width:50%; max-width: 50%; margin-left: auto; margin-right: auto;">
                        <thead>
                        </thead>
                        <tbody>
                            <th scope="row">
                                <canvas id="myChart" style="width:100%; max-width: 100%;"></canvas>

                                <script>
                                    const xValues = [];
                                    const yValues = [];
                                    
                                    <?php                            
                                        $stmt = $conn->prepare("SELECT date, monthly_new_cases FROM monthly_active_cases WHERE 
                                        iso_code = ?;");
                                        $stmt->bind_param("s", $iso_code);
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        while($row2 = $result->fetch_assoc())
                                        {?>
                                            xValues.push("<?php echo $row2['date']; ?>");
                                            yValues.push(<?php echo $row2['monthly_new_cases']; ?>);
                                        <?php }
                                    ?>
                                    
                                    new Chart("myChart", {
                                        type: "line",
                                        data: {
                                            labels: xValues,
                                            datasets: [{
                                                fill: false,
                                                lineTension: 0,
                                                backgroundColor: "rgba(255,255,255,1.0)",
                                                borderColor: "rgba(255,255,255,1.0)",
                                                pointBackgroundColor: "rgba(69,77,85,1.0)",
                                                pointBorderColor: "rgba(255,255,255,1.0)",
                                                data: yValues
                                            }]
                                        },
                                        options: {
                                            legend: {display: false},
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        min: Math.min(...yValues),
                                                        max: Math.max(...yValues),
                                                        fontColor: "white"
                                                    },
                                                    gridLines: {
                                                        display: true ,
                                                        color: "rgba(69,77,85,1.0)"
                                                    }
                                                }],
                                                xAxes: [{
                                                    ticks: {
                                                        min: 50,
                                                        max:150,
                                                        fontColor: "white"
                                                    },
                                                    gridLines: {
                                                        display: true ,
                                                        color: "rgba(69,77,85,1.0)"
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>
                            </th>
                        </tbody>
                    </table>
                    <br>
                    <div class="d-flex justify-content-center">
                        <a href="process_index.php?next=<?php echo $iso_code; ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Back</a>
                        <a href="index.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Home</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include "templates/footer.inc.php"; ?>
        </main>

    </body>