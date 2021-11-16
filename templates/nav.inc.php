<?php session_start();?>
<?php
if (!empty($_SESSION['admin'])){?>
    <nav class="navbar navbar-light navbar-fixed-top navbar-expand-lg fixed-top py-3 justify-content-lg-center">   
        <a href="index.php" class="navbar-brand d-flex w-50 mr-auto">
            <img src="assets/white1.png" alt="Logo large" style="width:15%;" class="d-none d-lg-block">
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="navbarNav">
            <ul class="navbar-nav w-100 justify-content-lg-center">
                <li class="nav-item">
                    <a class="nav-link" style="color:white" href="insert_vaccination_status.php">Insert</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white" href="edit_population.php">Update</a>
                </li>
            </ul>     
            
            <ul class="navbar-nav justify-content-lg-end w-100">
                <li class="nav-item">
                    <a class="nav-link" style="color:white">Welcome, Admin</a>
                </li>
            </ul>
            <form class="form-inline ml-auto justify-content-lg-end">
                <button class="btn btn-danger" type="button" onclick="window.location = 'logout.php';" id="navTickets-btn">LOGOUT</button>
            </form>
        </div>
    </nav>
<?php }else{ ?>
    <!--Nav for logged in user-->
    <nav class="navbar navbar-light navbar-fixed-top navbar-expand-lg fixed-top py-3 justify-content-lg-center">   
        <a href="index.php" class="navbar-brand d-flex w-50 mr-auto">
            <img src="assets/white1.png" alt="Logo large" style="width:15%;" class="d-none d-lg-block">
        </a>
    </nav>
<?php } ?>

