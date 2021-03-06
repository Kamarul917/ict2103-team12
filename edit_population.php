<!DOCTYPE html>
<?php include "templates/nav.inc.php"; ?>
<?php
if (!isset($_SESSION["admin"])) {
    header("location: admin_login.php");
} else {
    $Admin = $_SESSION['admin'];
}
?>
<?php
    include 'db/connect.php';
?>
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

        <script>
            function checkempty(){
                if(document.getElementById("population").value.length == 0){
                    $("#apply").attr("data-toggle", "modal");
                    $("#apply").attr("data-target", "#ModalCenter2");
                }
                else{
                    $("#apply").attr("data-toggle", "modal");
                    $("#apply").attr("data-target", "#ModalCenter");
                }
            }
        </script>
        
    </head>

    <body>
        <main>
            <header>            
            </header>
            <?php include "templates/intro1.inc.php"; ?>
            <div class="container-fluid">
                <div class="align-self-center">
                    <div class="col-lg-12 col-md-12 my-4 align-self-center">
                        <div class="d-flex justify-content-center">
                            <h2>Edit Population</h2>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <input type="submit" class="btn btn-info mr-2" id="name-submit" value="Grab">
                            <form action="edit_population_process.php" method="post">
                                <div class="form-group">
                                    <label for="country">Select a Country:</label>
                                    <select id="country" name="country" class="form-control" aria-label="country">
                                        <option value="none">Select</option>
                                        <?php
                                            $sqli = "SELECT * FROM country";
                                            $result = mysqli_query($con1, $sqli);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option value="'.$row['iso_code'].'">'.$row['country_name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type = "text" class="form-control" name="population" id="population" placeholder="Enter new population">
                                </div>

                                <div class="form-group">
                                    <button type="button" onclick="checkempty()" class="btn btn-success" id="apply" name="apply">Apply</button>  
                                </div>

                                <br>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true" >
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body" style="background-color:#222222">
                                                <a>Confirm?</a>
                                            </div>
                                            <div class="modal-footer" style="background-color:#222222">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success" name = "submitbtn" id="submitbtn">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal 2-->
                                <div class="modal fade" id="ModalCenter2" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body" style="background-color:#222222">
                                                <a>Please fill in the field and choose a country</a>
                                            </div>
                                            <div class="modal-footer" style="background-color:#222222">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <?php include "templates/footer.inc.php"; ?>
            <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
            <script src="js/global.js"></script>
        </main>
    </body>
</html>
