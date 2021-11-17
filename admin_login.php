<!DOCTYPE html>
<?php
        include "templates/nav.inc.php";
        ?>
<html lang="en">
    <head>
        <title>Employee Login | iCovidTravel</title>
        <?php include "templates/head2.inc.php"; ?>
        <?php include "templates/head.inc.php"; ?>
        <!--Custom CSS-->
        <link rel="stylesheet" href="css/account.css">
    </head>
    <body>
        <main>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card mt-4">
                            <header class="card-header">
                                <h1 style="font-size: 2rem;" class="card-title mt-2">Admin Login</h1>
                            </header>
                            <div class="card-body">
                                <form action="adminPage.php" method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" id="adminuserID" name="adminuserID" class="form-control" placeholder="Username" aria-label="adminusername">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" id="adminpwd" name="adminpwd" class="form-control" placeholder="Password" aria-label="password">
                                    </div> <!-- form-group end.// -->  
                                    <div class="form-group">
                                        <button type="submit" value="Login" class="btn btn-primary btn-block"> Login  </button>
                                    </div> <!-- form-group// -->                                               
                                </form>
                            </div> <!-- card-body end .// -->
                        </div> <!-- card.// -->
                    </div> <!-- col.//-->
                </div> <!-- row.//-->
            </div> 
        </main>
        <?php
        include "templates/footer.inc.php";
        ?>
    </body>
</html>