<?php

include 'config.php';
//// Define and initialize global variables:
$country = $iso = $errorMsg = "";
$success = true;
//
// Only process if the form has been submitted via POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // country
    if (($_POST["country"]) == "none") {
        $errorMsg .= "Please select a country.<br>";
        $success = false;
    } else {
        $iso = ($_POST["country"]);
    }
}

    $stmt = $conn->prepare("SELECT * FROM country WHERE iso_code = ?");
    $stmt->bind_param("s", $iso);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
            // Note that email field is unique, so should only have
            // one row in the result set.
            $row = $result->fetch_assoc();
            $cName = $row["country_name"];
            $cPop = $row["population"];
            $stmt->close();
            $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Selected Country</title>
        <?php
        include "templates/head2.inc.php";
        include "templates/head.inc.php";
        ?>
    </head>
    <?php
        include "templates/nav.inc.php";
        ?>
    <body>
        <main>
            <hr>
            <?php include "templates/intro1.inc.php"; ?>
            <?php
            if ($success) {?>

                <div class='card-body'>
                    <form action='process_function.php' method='post'>
                        <div class='form-group'>
                            <a><?php echo $cName. " "?> is safe/unsafe.</a><br>
                                <label for="function1" class='align-self-center'>Select a Function:</label>
                                <select id='function1' name='function1' class='form-control' aria-label='function1'>
                                    <option value="1">View Information</option>
                                    <option value="2">View Graph</option>
                                </select>
                                <select id='function2' name='function2' class='form-control' aria-label='function2' style="margin-top: 80px">
                                    <option value="3">Daily Vaccination Graph</option>
                                    <option value="4">Active Case Graph</option>
                                    <option value="5">Serious Cases and Death Graph</option>
                                    <option value="6">All Information</option>
                                    <option value="7">Vaccination %</option>
                                    <option value="8">Active Cases to Total Population</option>
                                    <option value="9">Serious Cases to Active Cases</option>
                                    <option value="10">Vaccines Offered</option>
                                </select>
                        </div>
                        <div class="form-group" style="text-align: center; margin-top: 10px;">
                            <button type="submit" value="submit" class="btn btn-primary btn-block text-uppercase account-btn">Let's Go</button>
                        </div> <!-- form-group// -->
                    </form>
                </div>
                
            <?php } else { 

                echo "<h2>Oops!</h2>";
                echo "<h4>The following error was detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<a href='index.php' class='btn btn-warning'>Return to Homepage</a>";
            }
            ?>
            <hr>
        </main>
        <?php
        include "templates/footer.inc.php";
        ?>
<!--        <style>
            body{
                color:#f4f4f4;
                background-color: #222222;
            }
        </style>-->
        </body>
</html>  