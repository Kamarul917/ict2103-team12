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
                                <select id='slct1' name='slct1' class='form-control' aria-label='slct1' onchange="populate(this.id, 'slct2')">
                                    <option value="">Select a function</option>
                                    <option value="info">View Information</option>
                                    <option value="graph">View Graph</option>
                                </select>
                                <select id='slct2' name='slct2' class='form-control' aria-label='slct2' style="margin-top: 20px">
                                    <option value ="none"
<!--                                    <option value="DVG">Daily Vaccination Graph</option>
                                    <option value="ACG">Active Case Graph</option>
                                    <option value="SCDG">Serious Cases and Death Graph</option>
                                    <option value=1>All Information</option>
                                    <option value=2>Vaccination %</option>
                                    <option value="ACTP">Active Cases to Total Population</option>
                                    <option value="SCAC">Serious Cases to Active Cases</option>
                                    <option value="VO">Vaccines Offered</option>-->
                                </select>
                        </div>
                        <div class="form-group" style="text-align: center; margin-top: 10px;">
                            <a class="btn btn-danger text-uppercase mt-2 delete-btn" href="index.php">Select Another Country</a>
                            <button type="submit" value="submit" class="btn btn-primary mt-2 text-uppercase proceed-btn">Let's Go</button>
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
            <script>
            
            function populate(select1,select2)
            {
                    var s1 = document.getElementById(select1);
                var s2 = document.getElementById(select2);
                
                s2.innerHTML = "";
                
                if(s1.value == "info")
                {
                    var optionArray = ['3|All Information', '4|Vaccination %', '3|Active Cases to Total Population', '4|Serious Cases to Active Cases', '5|Vaccines Offered'];
                }
                else if(s1.value == 'graph')
                {
                    var optionArray = ['6|Daily Vaccination Graph', '7|Active Cases Graph', '8|Serious Cases and Death Graph'];
                }
                
                for(var option in optionArray)
                {
                    var pair = optionArray[option].split("|");
                    var newoption = document.createElement("option");
                    
                    newoption.value = pair[0];
                    newoption.innerHTML=pair[1];
                    s2.options.add(newoption);
                }
            }
            </script>
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