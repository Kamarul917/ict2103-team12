<?php
include 'config.php';

if (isset($_GET['next'])) {
    $iso_code = $_GET['next'];
}

$data = [];
$sqli = "SELECT * FROM covid_data where iso_code = '$iso_code'";
$result = mysqli_query($conn, $sqli);
while ($row = mysqli_fetch_array($result)) {
    
        array_push($data, array("label" => "Death Cases", "symbol" => "Death", "y" => $row['death_cases']));
        array_push($data, array("label" => "Serious Cases", "symbol" => "Serious", "y" => $row['serious_cases']));
    
}



$stmt = $conn->prepare("SELECT country_name, serious_cases, death_cases, active_cases, population FROM covid_data, country 
    WHERE covid_data.iso_code = country.iso_code and covid_data.iso_code = ? ");
$stmt->bind_param("s", $iso_code);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$serious_cases = $row["serious_cases"];
$country_name = $row["country_name"];
$death_cases = $row["death_cases"];
$active_cases = $row["active_cases"];
$population = $row["population"];

function sigFig($value, $digits) {
    if ($value == 0) {
        $decimalPlaces = $digits - 1;
    } elseif ($value < 0) {
        $decimalPlaces = $digits - floor(log10($value * -1)) - 1;
    } else {
        $decimalPlaces = $digits - floor(log10($value)) - 1;
    }

    $answer = round($value, $decimalPlaces);
    return $answer;
}

$percentOfPopulationInfected = sigFig((($active_cases + $serious_cases) / $population * 100), 3);
$ratioOfSeriousToActive = sigFig((($serious_cases / $active_cases) * 100), 3);


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
                            <h2><?php echo $country_name; ?> Serious and Death Cases Graph</h2>
                        </div>
                        <br>
                       <div id="chartContainer"  style="height: 400px; width: 80%; padding-left: 10%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <br>
                        <label for="date" class='align-self-center'>Select Other Country:</label>
                        <form action="process_selection_country_graph.php" method="post">
                            <select id="death" name="death" class="form-control" aria-label="country">
                                <option value="none">Select</option>
<?php
$sqli = "SELECT * FROM country";
$result = mysqli_query($conn, $sqli);
while ($row = mysqli_fetch_array($result)) {
    echo '<option value="' . $row['iso_code'] . '">' . $row['country_name'] . '</option>';
}
?>
                            </select>
                            <div class="form-group" style="text-align: center; margin-top: 20px; width: 10%;">
                                <button type="submit" value="submit" class="btn btn-primary btn-block text-uppercase account-btn">Let's Go</button>
                            </div> 
                        </form>
                        <br>

                        <div class="d-flex justify-content-center">

                            <a href="process_index.php?next=<?php echo $iso_code; ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Back</a>&nbsp;
                            <a href="index.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Home</a>
                        </div>
                    </div>
                </div>
            </div>
<?php include "templates/footer.inc.php"; ?>
        </main>

    </body>
 <script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
};
</script>