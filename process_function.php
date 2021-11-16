<?php
ob_start();
include 'config.php';
//// Define and initialize global variables:
$country = $selFunc = $errorMsg = "";
$success = true;
//
// Only process if the form has been submitted via POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // country
    if (($_POST["slct2"]) == "none") {
        $errorMsg .= "Please select a country.<br>";
        $success = false;
    } else {
        $selFunc = ($_POST["slct2"]);
        echo "$selFunc";
    }
}

if(isset($_POST['iso_code'])) {
        $iso_code = $_POST['iso_code'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Selected Function</title>
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
            
            <?php
            if ($success) {
                switch ($selFunc){
                    case 3:
                        header("location: display_case_info.php?next=$iso_code");
                        ob_end_flush();
                        break;
                    case 4:
                        header("location: display_vaccine_info.php?next=$iso_code");
                        ob_end_flush();
                        break;
                    case 6:
                        header("location: display_daliy_vaccine_graph.php?next=$iso_code");
                        ob_end_flush();
                        break;
                    case 7:
                        header("location: display_active_cases_graph.php?next=$iso_code");
                        ob_end_flush();
                        break;
                    case 8:
                        header("location: display_death_serious_graph.php?next=$iso_code");
                        ob_end_flush();
                        break;
                    default:
                        header("location: display_case_info.php?next=$iso_code");
                        ob_end_flush();
                }    
                
              } else { 
                echo "<?php include 'templates/intro1.inc.php'; ?>";
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
                    var optionArray = ['3|All Information', '4|Vaccination %', '3|Active Cases to Total Population', '4|Serious Cases to Active Cases', '4|Vaccines Offered'];
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
        </body>
</html>  