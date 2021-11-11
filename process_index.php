<?php
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
                            <a><?php echo $iso. " "?> is safe/unsafe.</a><br>
                                <label for="function1" class='align-self-center'>Select a Function:</label>
                                <select id='function1' name='function1' class='form-control' aria-label='function1'>
                                    <option value="1">Function 1</option>
                                    <option value="2">Function 2</option>
                                    <option value="3">Function 3</option>
                                    <option value="4">Function 4</option>
                                </select>
                                <select id='function2' name='function2' class='form-control' aria-label='function2'>
                                    <option value="5">Function 5</option>
                                    <option value="6">Function 6</option>
                                    <option value="7">Function 7</option>
                                    <option value="8">Function 8</option>
                                </select>
                        </div>
                        <div class="form-group" style="text-align: center; margin-top: 80px;">
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