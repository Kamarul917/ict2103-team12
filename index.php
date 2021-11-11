<?php
include 'config.php';
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
<!--            <form action="process_index.php" method="post">
                <div class="container-fluid">
                    <div class="align-self-center">
                        <div class="col-lg-12 col-md-12 my-4 align-self-center">
                            <div style="text-align: center;">
                            <label for="country">Select a Country:</label>
                            </div>
                            <div style="text-align: center; margin-top: 30px;">
                            <select name="country" id="country">
                                <option value="none">Select</option>
                                <?php
//                                    $sqli = "SELECT * FROM country";
//                                    $result = mysqli_query($conn, $sqli);
//                                    while ($row = mysqli_fetch_array($result)) {
//                                        echo '<option value="'.$row['iso_code'].'">'.$row['country_name'].'</option>';
//                                    }
                                ?>
                            </select>
                            </div>
                            <div style="text-align: center; margin-top: 80px;">
                                <button type="submit" value="process" class="btn btn-primary btn-block text-uppercase account-btn">Let's Go!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>-->
            <div class="card-body">
                                <form action="process_login.php" method="post">
                                    <div class="form-group">
                                        <label for="country">Select a Country:</label>
                                        <select id="country" name="country" class="form-control" aria-label="country">
                                            <option value="none">Select</option>
                                                <?php
                                                    $sqli = "SELECT * FROM country";
                                                    $result = mysqli_query($conn, $sqli);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '<option value="'.$row['iso_code'].'">'.$row['country_name'].'</option>';
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" value="submit" class="btn btn-primary btn-block text-uppercase account-btn">Let's Go</button>
                                    </div> <!-- form-group// -->                                               
                                </form>
                            </div> <!-- card-body end .// -->
            <?php include "templates/footer.inc.php"; ?>
        </main>
    </body>
</html>

